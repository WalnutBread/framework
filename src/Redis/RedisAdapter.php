<?php
namespace WalnutBread\Redis;

use Redis;

class RedisAdapter
{
    public static $redisApp;

    public function __construct() { }

    public static function setup(string $ip, string $port, string $auth = null, int $db) {
        try {
            self::$redisApp = new Redis();
            self::$redisApp->connect($ip, $port, 2.5, NULL, 150);
            self::$redisApp->auth($auth);
            self::$redisApp->select($db);
        } catch (\RedisException $e) {
            var_dump("레디스 접속 정보가 잘못되었습니다.");
            exit(0);
        }
    }

    public function zIncrBy(string $key, int $value, string $member) {
        self::$redisApp->zIncrBy($key, $value, $member);
    }

    public function get(string $key) {
        return self::$redisApp->get($key);
    }

    public function zRange(string $key, int $start, int $end) {
        return self::$redisApp->zRange($key, $start, $end);
    }
    
    public function zRevRank(string $key, string $member) {
        return self::$redisApp->zRevRane($key, $member);
    }
}
