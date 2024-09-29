<?php

namespace Micx\SDK\Docfusion\Type;

class ApiIntelliParseResponse
{

    public function __construct(

        public string $doc_filename,
        public string $response_format,
        public string|array $response_data,
        public ?string $icon_b64_woff_data = null
    ) {
    }

    public string $version = "1.0";

}
