<?php

namespace Micx\SDK\Docfusion;

use Micx\SDK\Docfusion\Helper\JsonSchemaGenerator;
use Micx\SDK\Docfusion\Type\ApiIntelliParseRequest;
use Micx\SDK\Docfusion\Type\ApiIntelliParseResponse;

/**
 *
 */
class DocfusionFacade
{

    public function __construct(private DocfusionClient $client)
    {
    }


    /**
     * @template T
     * @param string $filename
     * @param array|null $schema
     * @param $instructions
     * @param string|null $fileData
     * @param class-string<T>|null $cast
     * @return ApiIntelliParseResponse<T>
     */
    public function promptFile(string $filename, array|null $schema=null, $instructions = "", string $fileData =null) : ApiIntelliParseResponse
    {
        if ($fileData === null) {
            $fileData = file_get_contents($filename);
            if ($fileData === false)
                throw new \InvalidArgumentException("File not found: $filename");
        }

        $request = new ApiIntelliParseRequest(
            doc_filename: $filename,
            doc_b64_data: base64_encode($fileData),
            output_json_schema: $schema,
            createThumbnail: true,
            thumbnail_dimensions: "200x200",
            thumbnail_format: "woff",
            thumbnail_type: "fit",
            prompt_instructions: $instructions
        );
        $response = $this->client->intelliparse($request);
        return $response;
    }


    /***
     * @template T
     * @param string $filename
     * @param class-string<T> $cast
     * @param $instructions
     * @param string|null $fileData
     * @return T
     */
    public function promptFileWithCast(string $filename, string $cast, $instructions = "", string $fileData =null)
    {
        $schema = (new JsonSchemaGenerator())->convertToJsonSchema($cast);
        return $this->promptFile($filename, $schema, $instructions, $fileData)->getCastedOutput($cast);
    }


}
