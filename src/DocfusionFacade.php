<?php

namespace Micx\SDK\Docfusion;

use Micx\SDK\Docfusion\Type\ApiIntelliParseRequest;
use Micx\SDK\Docfusion\Type\ApiIntelliParseResponse;

class DocfusionFacade
{

    public function __construct(DocfusionClient $client)
    {
        $this->client = $client;
    }




    public function promptFile(string $filename, $schema, $instructions = null, string $fileData =null) : ApiIntelliParseResponse
    {
        if ($fileData === null) {
            $fileData = file_get_contents($filename);
            if ($fileData === false)
                throw new \InvalidArgumentException("File not found: $filename");
        }
        return $this->client->intelliparse(new ApiIntelliParseRequest(
            doc_filename: $filename,
            doc_b64_data: base64_encode($fileData),
            output_json_schema: $schema,
            createThumbnail: true,
            thumbnail_dimensions: "200x200",
            thumbnail_format: "woff",
            thumbnail_type: "fit",
            prompt_instructions: $instructions
        ));
    }




}
