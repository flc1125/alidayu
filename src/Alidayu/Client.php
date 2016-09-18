<?php
namespace Flc\Alidayu;

use Exception;

/**
 * 阿里大于客户端
 *
 * @author Flc <2016-09-18 19:43:18>
 * @link   http://flc.ren
 */
class Client
{   
    /**
     * 阿里大于配置
     * @var array
     */
    protected $config = [];

    /**
     * 初始化
     * @param array $config 阿里大于配置
     */
    public function __construct(App $app)
    {
        if (empty($app->app_key) || empty($app->app_secret)) {
            throw new Exception("阿里大于配置信息：app_key或app_secret错误");            
        }
    }

    public function execute()
    {
        
    }
}
