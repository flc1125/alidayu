## 阿里大鱼API接口（短信接口）范例

> 提供方官网：http://www.alidayu.com/
>
> PHP版本：PHP>=5.4

### 配置说明

文件`/Inc/config.inc.php`定义`AlidayuAppKey`和`AlidayuAppSecret`即可。获取，请参考官网！

### 使用说明

```php
<?php
use Alidayu\AlidayuClient as Client;
use Alidayu\Request\SmsNumSend;

$client  = new Client;
$request = new SmsNumSend;

// 短信内容参数
$smsParams = [
    'code'    => randString(),
    'product' => '测试的'
];

// 设置请求参数
$req = $request->setSmsTemplateCode('SMS_5053601')
    ->setRecNum('13312341234')
    ->setSmsParam(json_encode($smsParams))
    ->setSmsFreeSignName('活动验证')
    ->setSmsType('normal')
    ->setExtend('demo');

print_r($client->execute($req));
?>
```

### 其他说明

- 目前仅开发短信相关功能，如需拓展，请在`/Alidayu/Request/`目录下新增类，以开发更多功能接口！

- 开发文档参考网址：http://open.taobao.com/doc2/apiDetail.htm?spm=0.0.0.0.pjxLXY&apiId=25450