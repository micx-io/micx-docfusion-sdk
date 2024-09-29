<?php

namespace Micx\SDK\Docfusion;

use Micx\SDK\Docfusion\Type\ApiIntelliParseRequest;
use Micx\SDK\Docfusion\Type\ApiIntelliParseResponse;

/**
 * @template T
 */
class DocfusionFacade
{

    public function __construct(private DocfusionClient $client)
    {
    }


    /**
     * @param string $filename
     * @param array|null $schema
     * @param $instructions
     * @param string|null $fileData
     * @param class-string<T>|null $cast
     * @return ApiIntelliParseResponse<T>
     */
    public function promptFile(string $filename, array|null $schema=null, $instructions = null, string $fileData =null, string|null $cast = null) : ApiIntelliParseResponse
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
