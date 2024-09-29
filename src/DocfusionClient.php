<?php

namespace Micx\SDK\Docfusion;

use Micx\SDK\Docfusion\Type\ApiIntelliParseRequest;
use Micx\SDK\Docfusion\Type\ApiIntelliParseResponse;

class DocfusionClient
{

    public function __construct(
        private string $subscriptionId,
        private string $accessToken,
        private ?string $serverUrl = null)
    {
        if ($serverUrl === null) {
            $this->serverUrl = "https://ws.micx.io/docfusion/api/v1";
        }


    }


    public function intelliparse(ApiIntelliParseRequest $request) : ApiIntelliParseResponse {

        return phore_http_request($this->serverUrl . "/" . $this->subscriptionId . "/intelliparse")
            ->withBasicAuth($this->accessToken)
            ->withJsonBody((array)$request)
            ->send()
            ->getBodyJson(ApiIntelliParseResponse::class);
    }


}
