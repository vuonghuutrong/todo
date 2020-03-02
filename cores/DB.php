<?php
namespace Cores;

use \PDO;

class DB
{
    protected static $servername = "localhost";
    protected static $dbname = "todo";
    protected static $username = "root";
    protected static $password = "";

    public function __construct()
    {
        self::con();
    }

    private static function con()
    {
        $pdo = new PDO('mysql:host=' . self::$servername . ';dbname=' . self::$dbname . ';charset=utf8', self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    public static function query($query, $params = array())
    {
        $stmt = self::con()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }
}
