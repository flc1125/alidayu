<?php
/**
 * 阿里大鱼主调用类
 *
 * @author Flc <2016-02-18 21:18:55>
 * @link http://flc.ren 叶子坑
 */
namespace Alidayu;

class AlidayuClient
{
    /**
     * 正式环境API请求地址
     */
    const API_URI = 'http://gw.api.taobao.com/router/rest';

    /**
     * 沙箱环境API请求地址
     */
    const SANDBOX_URI = 'http://gw.api.tbsandbox.com/router/rest';

    /**
     * App Key
     * 
     * @var string
     * @link http://my.open.taobao.com/ 请到此处申请
     */
    protected $appKey;

    /**
     * App Secret
     * 
     * @var string
     * @link http://my.open.taobao.com/ 请到此处申请
     */
    protected $appSecret;

    /**
     * api请求地址
     * @var string
     */
    protected $apiURI;


    /**
     * 构造方法
     * 
     * @param string $appKey    [description]
     * @param string $appSecret [description]
     */
    public function __construct($appKey = '', $appSecret = '')
    {
        $this->appKey    = $appKey ?: config('AlidayuAppKey');
        $this->appSecret = $appSecret ?: config('AlidayuAppSecret');
        $this->apiURI    = config('AlidayuApiEnv') ? self::API_URI : self::SANDBOX_URI;
    }

    /**
     * 设置AppKey
     * @param string $value AppKey
     */
    public function setAppKey($value)
    {
        $this->appKey = $value;
    }

    /**
     * 设置App Secret
     * @param string $value AppSecret
     */
    public function setAppSecret($value)
    {
        $this->appSecret = $value;
    }

    /**
     * 执行请求
     * @param  Object $request 请求参数
     * @return array|false           
     */
    public function execute($request)
    {
        $params = $request->getParams();
        $params = array_merge($this->publicParams(), $params);

        $params['sign'] = $this->sign($params);

        $req = $this->curl($this->apiURI, $params);
        return json_decode($req, true);
    }    

    /**
     * 公共参数
     * @return array 
     */
    protected function publicParams()
    {
        return [
            'app_key'     => $this->appKey,
            'timestamp'   => date('Y-m-d H:i:s'),
            'format'      => 'json',
            'v'           => '2.0',
            'sign_method' => 'md5'
        ];
    }

    /**
     * 签名
     * @param  array $params 参数
     * @return string         
     */
    public function sign($params)
    {
        ksort($params);

        $tmps = [];
        foreach ($params as $k => $v) {
            $tmps[] = $k . $v;
        }

        $string = $this->appSecret . implode('', $tmps) . $this->appSecret;

        return strtoupper(md5($string));
    }

    /**
     * curl请求
     * @param  string $url        string
     * @param  array|null $postFields 请求参数
     * @return [type]             [description]
     */
    public function curl($url, $postFields = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //https 请求
        if(strlen($url) > 5 && strtolower(substr($url,0,5)) == "https" ) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        if (is_array($postFields) && 0 < count($postFields)) {
            $postBodyString = "";
            foreach ($postFields as $k => $v) {
                $postBodyString .= "$k=" . urlencode($v) . "&"; 
            }
            unset($k, $v);
            curl_setopt($ch, CURLOPT_POST, true);

            $header = array("content-type: application/x-www-form-urlencoded; charset=UTF-8");
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
        }

        $reponse = curl_exec($ch);
        return $reponse;
    }
}