<?php

namespace Micx\SDK\test;

use App\test\TestCastObj;
use Micx\SDK\Docfusion\DocfusionClient;
use Micx\SDK\Docfusion\DocfusionFacade;

class DemoTest extends \PHPUnit\Framework\TestCase
{

    public function testBasicUsage()
    {
        $client = new DocfusionClient("demo1", "test:test", "http://localhost/api");
        $facade  = new DocfusionFacade($client);

        $out = $facade->promptFileWithCast(__DIR__ . "/mock/Vorlage Webdesign.docx", TestCastObj::class);
        assert ($out instanceof TestCastObj);
    }

}
