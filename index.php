<?php
/**
 * 阿里大鱼API接口（短信接口）范例
 *
 * @author Flc <2016-02-18 23:18:10>
 * @link http://flc.ren 
 * @link https://code.csdn.net/flc1125/alidayu
 */
header ("Content-Type:text/html; charset=UTF-8");

define('ROOT_PATH', __DIR__); // 定义根目录常量
date_default_timezone_set('PRC'); // 设置系统时区

require_once ROOT_PATH . '/vendor/autoload.php';

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
