<?php
namespace app\common\traits;

use think\Config;
use think\Exception;

trait Redis {

    protected static $redis;

    public static function redis() {
        if (!self::$redis) {
            self::$redis = new \Redis();
            self::$redis->connect(config('redis_conf.host'),config('redis_conf.ports'));
            self::$redis->auth('redis_conf.auth');
        }
        return self::$redis;
    }

    protected function redisQuit(){
        self::$redis->quit();
        self::$redis = null;
    }

    protected function getKeyPre($key) {
        if (!Config::get('redis_key')) {
            Config::load(APP_PATH.'common/conf/redis_key.php');
        }
        $key_pre = Config::get('redis_key.'.$key);

        if (!$key_pre) {
            $key_pre = '';
        }
        return $key_pre;
    }

    protected function getKeyName($key,$suf) {
        if (!$suf) {
            throw new Exception('redis key后缀为空!');
        }
        $key_pre = $this->getKeyPre($key);
        return $key_pre.$suf;
    }
}