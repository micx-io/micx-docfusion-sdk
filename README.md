# Docfusion SDK



## Example

```php
$client = new DocfusionClient("demo1", "test:test", "http://localhost/api");
$facade  = new DocfusionFacade($client);

$out = $facade->promptFileWithCast(__DIR__ . "/mock/Vorlage Webdesign.docx", TestCastObj::class);
assert ($out instanceof TestCastObj);
```
