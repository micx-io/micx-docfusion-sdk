<?php

namespace Micx\SDK\Docfusion\Type;

class ApiIntelliParseRequest
{
    /**
     * @var string
     */
    public string $version = "1.0";


    public function __construct(



        /**
         * The filename of the document
         *
         * @var string
         */
        public string $doc_filename,

        /**
         * The base64 encoded data of the document
         *
         * @var string
         */
        public string $doc_b64_data,

        /**
         * The Json Schema the output should adhere to
         *
         * @var array|null
         */
        public array|null $output_json_schema = null,

        /**
         *
         * @var bool
         */
        public bool $createThumbnail = false,

        /**
         * Create a thumbnail of the document and include it in the response
         *
         * @var string
         */
        public string|null $thumbnail_dimensions = "200x200",

        public string|null $thumbnail_format = "woff",

        public string|null $thumbnail_type = "fit",

        /**
         * Additional information to be passed to the AI (referenced as Instructions in the API)
         *
         * @var string|null
         */
        public string|null $prompt_instructions = null

    )
    {
    }



}
