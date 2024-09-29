<?php

namespace Micx\SDK\Docfusion\Type;


/**
 * 
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

    ) {
    }

    /**
     * @return mixed|T
     * @param class-string<T>|null $cast
     */
    public function getCastedOutput(?string $cast) : mixed {
        if ($this->castOutput === null)
            return $this->response_data;
        if (! function_exists("phore_hydrate"))
            throw new \InvalidArgumentException("phore/hydrator not found. Please install phore/hydrator to use casting.");
        return phore_hydrate($this->response_data, $cast);
    }
    public string $version = "1.0";

}
