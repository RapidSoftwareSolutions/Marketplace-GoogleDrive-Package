<?php

$app->post('/api/GoogleDrive/updateFileFromUpload', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken','fileId','uploadFile','contentType']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['accessToken'=>'access_token','fileId'=>'fileId','uploadFile'=>'uploadFile','contentType'=>'contentType'];
    $optionalParams = ['ignoreDefaultVisibility'=>'ignoreDefaultVisibility','keepRevisionForever'=>'keepRevisionForever','ocrLanguage'=>'ocrLanguage','supportsTeamDrives'=>'supportsTeamDrives','useContentAsIndexableText'=>'useContentAsIndexableText'];
    $bodyParams = [
       'query' => ['access_token','ignoreDefaultVisibility','ocrLanguage','supportsTeamDrives','keepRevisionForever','useContentAsIndexableText','fields','uploadFile']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    

    $client = $this->httpClient;
    $query_str = "https://www.googleapis.com/upload/drive/v3/files/{$data['fileId']}";

    if(!empty($data['modifiedTime']))
    {
        $time = strtotime($data['modifiedTime']);

        if($time !== false)
        {
            $data['modifiedTime'] =  date('Y-m-d\TH:i:s\Z',$time);
        }
    }

    if(!empty($data['viewedByMeTime']))
    {
        $time = strtotime($data['viewedByMeTime']);

        if($time !== false)
        {
            $data['viewedByMeTime'] =  date('Y-m-d\TH:i:s\Z',$time);
        }
    }

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Authorization"=>"Bearer {$data['access_token']}", "Content-Type"=>"{$data['contentType']}"];
    $requestParams['body'] = fopen($data['uploadFile'],'r');
    $requestParams['query']['uploadType'] = 'media';

    try {
        $resp = $client->patch($query_str, $requestParams);
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