<?php
/**
 * 函数相关文件
 *
 * @author Flc <2016-02-18 21:18:19>
 * @link http://flc.ren 叶子坑
 */

/**
 * 返回配置
 * @param  string $name 配置名，若为空，则返回所有配置
 * @return string|array|false
 */
function config($name = '')
{
    return \Library\Config::get($name);
}

/**
 * 获取随机位数数字
 * @param  integer $len 长度
 * @return string       
 */
function randString($len = 6)
{
    $chars = str_repeat('0123456789', $len);
    $chars = str_shuffle($chars);
    $str   = substr($chars, 0, $len);
    return $str;
}