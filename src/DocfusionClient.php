<?php

namespace Micx\SDK\Docfusion;

class DocfusionClient
{

    public function __construct(
        private string $subscriptionId,
        private string $accessToken,
        private ?string $serverUrl = null)
    {
        if ($serverUrl === null) {
            $this->serverUrl = "https://ws.micx.io/docfusion";
        }
    }

    /**
     * @template T
     * @param string $documentData
     * @param class-string<T> $className
     * @param string $context
     * @return T
     */
    public function extractDataFromDocument(string $documentData, DocfusionDocumentFormat $documentFormat, string $className, string $context = "") {

    }

    public function extractDataFromFile(string $file, string $className, string $context = "") {

    }


    public function answerDocument(string $documentData, DocfusionDocumentFormat $documentFormat, string $question, string $context = "") {

    }

}
