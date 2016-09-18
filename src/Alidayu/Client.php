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
     * 应用
     * @var \Flc\Alidayu\App
     */
    protected $app;

    /**
     * 阿里大于配置
     * @var array
     */
    protected $config = [];

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
        return $request->getParams();
    }
}
