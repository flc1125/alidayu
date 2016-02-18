<?php
/**
 * 配置文件读取操作类
 *
 * @author Flc <2016-02-18 21:18:55>
 * @link http://flc.ren 叶子坑
 */
namespace Library;

class Config
{
    /**
     * 配置数据
     * @var null
     */
    protected static $configs = null;

    /**
     * 配置文件路径
     * @var string
     */
    protected static $configPath = '/Inc/config.inc.php';

    /**
     * 读取相关配置
     * @param  string $name 配置键名，若为空，则返回所有配置
     * @return string|array|false       
     */
    public static function get($name = '')
    {
        self::$configs === null && self::getConfigs();

        $_configs = self::$configs;
        if ($_configs === false)
            return false;

        // 若为空，则返回所有配置
        if (empty($name))
            return $_configs;

        $name = strtoupper($name);
        if (!is_array($_configs) || !array_key_exists($name, $_configs))
            return false;

        return $_configs[$name];
    }

    /**
     * 读取所有配置
     * @return array 
     */
    protected static function getConfigs()
    {
        $file = ROOT_PATH . self::$configPath;
        if (!is_file($file)) 
            return self::$configs = false;

        $array = include $file;
        return self::$configs = array_change_key_case($array, CASE_UPPER);
    }
}