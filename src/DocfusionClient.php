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
            $this->serverUrl = "https://ws.micx.io/v1/docfusion/api";
        }


    }


    public function intelliparse(ApiIntelliParseRequest $request) : ApiIntelliParseResponse {

        $data = phore_http_request($this->serverUrl . "/" . $this->subscriptionId . "/intelliparse")
            ->withBasicAuth($this->accessToken)
            ->withJsonBody((array)$request)
            ->send()
            ->getBodyJson();
        
        return new ApiIntelliParseResponse(
            $data['doc_filename'],
            $data['response_format'],
            $data['response_data'],
            $data['icon_b64_woff_data'],
            $data['raw_text']
        );
    }


}
