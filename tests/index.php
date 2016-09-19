<?php
use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
use Flc\Alidayu\Requests\AlibabaAliqinFcTtsNumSinglecall;
use Flc\Alidayu\Requests\AlibabaAliqinFcVoiceNumSinglecall;

require __DIR__ . '/../vendor/autoload.php';

// 配置信息
$config = [
    'app_key'    => '23311747',
    'app_secret' => '89bb459e858382d1aac4ae2ccc9885cb',
];

$client = new Client(new App($config));

// 短信发送
$req    = new AlibabaAliqinFcSmsNumSend;
$req->setRecNum('18825277676')
    ->setSmsParam([
        'number' => rand(100000, 999999)
    ])
    ->setSmsFreeSignName('叶子坑')
    ->setSmsTemplateCode('SMS_15105357');

// 文本转语音通知 passed
$req = new AlibabaAliqinFcTtsNumSinglecall;
$req->setCalledNum('18825277676')
    ->setTtsParam([
        'username' => 'admin',
        'time'     => date('Y-m-d'),
        'client'   => '微网站'
    ])
    ->setCalledShowNum('051482043270')
    ->setTtsCode('TTS_15230020');

// 语音通知 passed
$req = new AlibabaAliqinFcVoiceNumSinglecall;
$req->setCalledNum('18825277676')
    ->setCalledShowNum('051482043270')
    ->setVoiceCode('08559b5f-0573-4e30-89ca-b82a9f4b94f8.wav');



print_r($req->getParams());

print_r($client->execute($req));
