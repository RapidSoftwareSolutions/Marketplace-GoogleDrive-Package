<?php

$app->post('/api/GoogleDrive/createFileFromMetadata', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['accessToken'=>'access_token'];
    $optionalParams = ['ignoreDefaultVisibility'=>'ignoreDefaultVisibility','keepRevisionForever'=>'keepRevisionForever','ocrLanguage'=>'ocrLanguage','supportsTeamDrives'=>'supportsTeamDrives','useContentAsIndexableText'=>'useContentAsIndexableText','appProperties'=>'appProperties','contentHintsIndexableText'=>'contentHintsIndexableText','contentHintsThumbnailImage'=>'contentHintsThumbnailImage','contentHintsMimeType'=>'contentHintsMimeType','description'=>'description','folderColorRgb'=>'folderColorRgb','id'=>'id','mimeType'=>'mimeType','modifiedTime'=>'modifiedTime','name'=>'name','originalFilename'=>'originalFilename','parents'=>'parents','properties'=>'properties','starred'=>'starred','viewedByMeTime'=>'viewedByMeTime','viewersCanCopyContent'=>'viewersCanCopyContent','writersCanShare'=>'writersCanShare'];
    $bodyParams = [
       'query' => ['access_token','ignoreDefaultVisibility','ocrLanguage','supportsTeamDrives','keepRevisionForever','useContentAsIndexableText','fields'],
       'json' => ['appProperties','contentHintsIndexableText','contentHintsThumbnailImage','contentHintsThumbnailMimeType','createdTime','description','folderColorRgb','id','mimeType','modifiedTime','name','originalFilename','parents','properties','starred','viewedByMeTime','viewersCanCopyContent','writersCanShare']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);


    $client = $this->httpClient;
    $query_str = "https://www.googleapis.com/drive/v3/files";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Authorization"=>"Bearer {$data['access_token']}"];

    if(!empty($data['contentHintsIndexableText']))
    {
        $requestParams['json']['contentHints']['IndexableText'] = $data['contentHintsIndexableText'];
    }

    if(!empty($data['contentHintsThumbnailImage']))
    {
        $requestParams['json']['contentHints']['thumbnail']['image'] = $data['contentHintsThumbnailImage'];
    }

    if(!empty($data['contentHintsMimeType']))
    {
        $requestParams['json']['contentHints']['thumbnail']['mimeType'] = $data['contentHintsMimeType'];
    }




    try {
        $resp = $client->post($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});