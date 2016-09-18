<?php
namespace Flc\Alidayu;

use Exception;
use Flc\Alidayu\Requests\IRequest;

/**
 * 阿里大于客户端
 *
 * @author Flc <2016-09-18 19:43:18>
 * @link   http://flc.ren
 */
class Client
{   
    /**
     * API请求地址
     * @var string
     */
    protected $api_uri = 'http://gw.api.taobao.com/router/rest';

    /**
     * 应用
     * @var \Flc\Alidayu\App
     */
    protected $app;

    /**
     * 签名规则
     * @var string
     */
    protected $sign_method = 'md5';

    /**
     * 初始化
     * @param array $config 阿里大于配置App类
     */
    public function __construct(App $app)
    {
        $this->app = $app;

        // 判断配置
        if (empty($this->app->app_key) || empty($this->app->app_secret)) {
            throw new Exception("阿里大于配置信息：app_key或app_secret错误");
        }
    }

    public function execute(IRequest $request)
    {
        return $this->generateSign($request->getParams());
    }

    /**
     * 生成签名
     * @param  array  $params 待签参数
     * @return string         
     */
    protected function generateSign($params = [])
    {
        if ($this->sign_method == 'md5') {
            return $this->generateMd5Sign($params);
        }

        elseif ($this->sign_method == 'hmac') {
            return $this->generateHmacSign($params);
        }

        else {
            throw new Exception("sign_method错误...");
        }
    }

    /**
     * 按Md5方式生成签名
     * @param  array  $params 待签的参数
     * @return string         
     */
    protected function generateMd5Sign($params = [])
    {
        static::sortParams($params);  // 排序

        $arr = [];
        foreach ($params as $k => $v) {
            $arr[] = $k . $v;
        }
        
        $str = $this->app->app_secret . implode('', $arr) . $this->app->app_secret;

        return strtoupper(md5($str));
    }

    /**
     * 按hmac方式生成签名
     * @param  array  $params 待签的参数
     * @return string         
     */
    protected function generateHmacSign($params = [])
    {
        static::sortParams($params);  // 排序

        $arr = [];
        foreach ($params as $k => $v) {
            $arr[] = $k . $v;
        }
        
        $str = implode('', $arr);

        return strtoupper(hash_hmac('md5', $str, $this->app->app_secret));
    }

    /**
     * 待签名参数排序
     * @param  array  &$params 参数
     * @return array         
     */
    protected static function sortParams(&$params = [])
    {
        ksort($params);
    }
}
