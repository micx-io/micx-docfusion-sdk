<?php

namespace Micx\SDK\Docfusion\Type;


/**
 * @template T
 *
 */
class ApiIntelliParseResponse
{

    /**
     * @param string $doc_filename
     * @param string $response_format
     * @param string|array $response_data
     * @param string|null $icon_b64_woff_data
     * @param class-string<T>|null $castOutput
     */
    public function __construct(

        public string $doc_filename,
        public string $response_format,
        public string|array $response_data,
        public ?string $icon_b64_woff_data = null,
        public ?string $castOutput = null
    ) {
    }

    /**
     * @return mixed|T
     */
    public function getCastedOutput() : mixed {
        if ($this->castOutput === null)
            return $this->response_data;
        if (! function_exists("phore_hydrate"))
            throw new \InvalidArgumentException("phore/hydrator not found. Please install phore/hydrator to use casting.");
        return phore_hydrate($this->response_data, $this->castOutput);
    }
    public string $version = "1.0";

}
