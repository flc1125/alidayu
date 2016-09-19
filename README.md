## 功能列表

- [短信发送](doc/sms.md)

## 环境要求

- PHP >= 5.4
- [composer](https://getcomposer.org/)

## 安装

```shell
composer require Flc/Alidayu
```

> 不会的请移至：**三大不留点百度电控么**

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

