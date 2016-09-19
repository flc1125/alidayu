## 功能列表

- `通过` [短信发送](docs/alibaba_aliqin_fc_sms_num_send.md)
- `通过` [文本转语音通知](docs/alibaba_aliqin_fc_tts_num_singlecall.md)
- `通过` [语音通知](docs/alibaba_aliqin_fc_voice_num_singlecall.md)
- `待测` ~~多方通话~~
- `待测` ~~流量直充~~
- `待测` ~~流量直充查询~~

> **`待测`**：因个人开发者，阿里大于权限相对较低。暂时无法测试；功能已开发，如测试可用，请告知~~

## 环境要求

- PHP >= 5.4
- [composer](https://getcomposer.org/)

## 安装

```shell
composer require Flc/Alidayu
```

> 不会的请移步：**三大不留点百度电控么**

## 使用

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

## 支持

- 官方网址： https://www.alidayu.com/
- 官方API文档： https://api.alidayu.com/doc2/apiList.htm
- composer： http://docs.phpcomposer.com/

## License

MIT
