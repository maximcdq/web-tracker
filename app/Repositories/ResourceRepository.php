<?php

namespace App\Repositories;

use App\Models\Resource;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ResourceRepository
{
    public function createSites($site)
    {
        Resource::store($site);
    }

    public function getSites()
    {
      return Resource::getUserResourcesWithPaginate();
    }

    private function checkUrlStatus(string $resourceUrl, int $responseCodeFromDb): int
    {
        $client = new Client();
        $request = new Request('GET', $resourceUrl);
        try {
            $response = $client->send($request);
            $responseCode = $response->getStatusCode();
        } catch (\Exception $e) {
        }
        if ($responseCode !== $responseCodeFromDb) {
            return $responseCode;
        }
        return 0;
    }

    private function modifyResources($resources)
    {
        $modifyResources = [];
        foreach ($resources as $resource) {
            $resourceResponseCode = $resource->response_code;
            $responseCode = $this->checkUrlStatus($resource->url, (int)$resourceResponseCode);

            if ($responseCode !== 0) {
                $mailData = new \stdClass();

                // user data
                $mailData->resourceName = $resource->name;

                // resource data
                $mailData->resourceURL = $resource->url;
                $mailData->oldResourseStatusCode = $resourceResponseCode;
                $mailData->newResourseStatusCode = $responseCode;

                $modifyResources[$resource->user_id]['userName'] = $resource->user->name;
                $modifyResources[$resource->user_id]['email'] = $resource->user->email;
                $modifyResources[$resource->user_id]['resources'][] = $mailData;
            }
        }

        return $modifyResources;
    }

    public function getModifyResources()
    {
        $resources = Resource::with('user')->get();
        return $this->modifyResources($resources);

    }
}
