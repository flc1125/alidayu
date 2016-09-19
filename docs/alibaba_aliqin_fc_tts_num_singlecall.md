# 文本转语音通知

`\Flc\Alidayu\Requests\AlibabaAliqinFcTtsNumSinglecall`

## 1. 官方文档

https://api.alidayu.com/docs/api.htm?spm=a3142.7629065.4.5.DH7XBj&apiId=25444

## 2. 参数、方法

|参数|方法|类型|是否必须|默认值|说明|
|----|----|----|----|----|----|
|called_num|setCalledNum($value)|string|**必须**| |设置被叫号码|
|tts_param|setTtsParam($value)|array&#124;string|可选| |设置内容模板参数|
|called_show_num|setCalledShowNum($value)|string|**必须**| |设置被叫号显|
|tts_code|setTtsCode($value)|string|**必须**| |设置TTS模板ID|
|extend|setExtend($value)|string|可选| |设置公共回传参数|

## 3. 使用

```php
<?php
use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;

// 配置信息
$config = [
    'app_key'    => '*****',
    'app_secret' => '************',
];

$client = new Client(new App($config));
$req    = new AlibabaAliqinFcSmsNumSend;

$req->setRecNum('13312341234')
    ->setSmsParam([

    ])
    ->setSmsFreeSignName('阿里大于')
    ->setSmsTemplateCode('11111');

print_r($client->execute($req));
?>
```
