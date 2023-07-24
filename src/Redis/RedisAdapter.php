<?php

use Dotenv\Dotenv;

class RedisAdapter
{
    public static string $ip = '';

    public static string $port = '';

    public static string $auth = '';

    public static $redis;

    public function __construct() { }

    public static function setup(int $db) {
        try {
            self::$redis = new Redis();
            self::$redis->connect(self::$ip, self::$port, 2.5, NULL, 150);
            self::$redis->auth(self::$auth);
            self::$redis->select($db);
        } catch (\RedisException $e) {
            var_dump("레디스 접속 정보가 잘못되었습니다.");
            exit(0);
        }
    }

    public function zIncrBy(string $key, int $value, string $member) {
        self::$redis->zIncrBy($key, $value, $member);
    }
}
