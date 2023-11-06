<?php

/**
 *
 */
class DB
{
    /**
     * @var
     */
    private static $connection;
    /**
     * @var
     */
    private static $config;

    /**
     * @return void
     */
    public static function connect()
    {
        $config = self::$config;
        try {
            self::$connection = new PDO("pgsql:host={$config['host']};port=5432;dbname={$config['db']};", $config['user'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @return void
     */
    public static function checkConnect()
    {
        if (!self::$connection){
            self::connect();
        }
    }

    /**
     * @param $sql
     * @param $params
     * @return mixed
     */
    public static function get($sql, $params = [])
    {
        self::checkConnect();

        $sth = self::$connection->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $config
     * @return void
     */
    public static function init($config)
    {
        self::$config = $config;
    }

}