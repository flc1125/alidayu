<?php
use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;

require __DIR__ . '/../vendor/autoload.php';

// 配置信息
$config = [
    'app_key'    => '23311747',
    'app_secret' => '89bb459e858382d1aac4ae2ccc9885cb',
];

$client  = new Client(new App($config));
$request = new AlibabaAliqinFcSmsNumSend;

print_r($client->execute($request));
