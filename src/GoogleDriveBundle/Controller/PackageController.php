<?php

/**
 * Created by PhpStorm.
 * User: George Cherenkov
 * Date: 15.05.17
 * Time: 11:25
 */

namespace GoogleDriveBundle\Controller;

use GuzzleHttp\Exception\ConnectException;
use RapidAPIBundle\Exception\PackageException;
use RapidAPIBundle\Exception\RequiredFieldException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PackageController
 * @Route("/api")
 */
class PackageController extends Controller
{
    /**
     * @Route("/GoogleDrive", name="getMetadata")
     * @Method("GET")
     *
     * @return JsonResponse
     */
    public function getMetadata()
    {
        try {
            $metadata = $this->get('metadata');
            $result = $metadata->getClearMetadata();
        } catch (PackageException $exception) {
            $result = $this->createPackageExceptionResponse($exception);
        }
        return new JsonResponse($result);
    }

    /**
     * @Route("/GoogleDrive/getAccessToken")
     * @Method("POST")
     *
     * @return JsonResponse
     */
    public function getAccessToken() {
        try {
            $manager = $this->get('manager');
            $manager->setBlockName(__FUNCTION__);

            $validData = $manager->getValidData();
            $validData['grant_type'] = 'authorization_code';

            $url = $manager->createFullUrl($validData, 'https://www.googleapis.com');
            $headers['Content-Type'] = "application/x-www-form-urlencoded";
            $urlParams = [];
            $result = $manager->send($url, $urlParams, $validData, $headers);
        } catch (PackageException $exception) {
            $result = $this->createPackageExceptionResponse($exception);
        } catch (RequiredFieldException $exception) {
            $result = $this->createRequiredFieldExceptionResponse($exception);
        }

        return new JsonResponse($result);
    }

    public function revokeAccessToken() {
        try {
            $manager = $this->get('manager');
            $manager->setBlockName(__FUNCTION__);

            $validData = $manager->getValidData();
            $validData['grant_type'] = 'authorization_code';

            $url = $manager->createFullUrl($validData);
            $headers['Content-Type'] = "application/x-www-form-urlencoded";
            $urlParams = [];
            $result = $manager->send($url, $urlParams, $validData, $headers);
        } catch (PackageException $exception) {
            $result = $this->createPackageExceptionResponse($exception);
        } catch (RequiredFieldException $exception) {
            $result = $this->createRequiredFieldExceptionResponse($exception);
        }

        return new JsonResponse($result);
    }

    /**
     * @Route("/GoogleDrive/{blockName}", requirements={"blockName" = "\w+"})
     * @Method("POST")
     *
     * @param null $blockName
     *
     * @return JsonResponse
     */
    public function getOtherMethods($blockName = null) {
        try {
            $manager = $this->get('manager');
            $manager->setBlockName($blockName);

//            $validData = $manager->getValidData();
            $bodyParams = $manager->getBodyParams();
            $urlParams = $manager->getUrlParams();

            $url = $manager->createFullUrl($bodyParams);
            $headers = $this->createHeaders($bodyParams);

            $result = $manager->send($url, $urlParams, $bodyParams, $headers);
        } catch (PackageException $exception) {
            $result = $this->createPackageExceptionResponse($exception);
        } catch (RequiredFieldException $exception) {
            $result = $this->createRequiredFieldExceptionResponse($exception);
        } catch (ConnectException $exception) {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = "INTERNAL_PACKAGE_ERROR";
            $result['contextWrites']['to']['status_msg'] = $exception->getMessage();
        } catch (\Exception $exception) {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = "INTERNAL_PACKAGE_ERROR2";
            $result['contextWrites']['to']['status_msg'] = $exception->getMessage();
        } catch (\Throwable $exception) {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = "INTERNAL_PACKAGE_ERROR3";
            $result['contextWrites']['to']['status_msg'] = $exception->getMessage();
        }

        return new JsonResponse($result);
    }

    private function createHeaders(&$data)
    {
        $result = [
            'Authorization' => 'Bearer ' . $data['access_token']
        ];
        unset($data['access_token']);

        return $result;
    }

    private function createPackageExceptionResponse(PackageException $exception)
    {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = $exception->getMessage();

        return $result;
    }

    private function createRequiredFieldExceptionResponse(RequiredFieldException $exception)
    {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = explode(',', $exception->getMessage());

        return $result;
    }
}