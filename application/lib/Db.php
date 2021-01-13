<?php

namespace application\lib;

use PDO;

class Db
{
    protected $host;
    protected $db;
    protected $charset;
    protected $user;
    protected $password;
    protected $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    protected $connection;

    public function __construct()
    {
        $config = require 'application/config/db.php';

        $this->host = $config['host'];
        $this->db = $config['db'];
        $this->charset = $config['charset'];
        $this->user = $config['user'];
        $this->password = $config['password'];
    }
    protected function connect()
    {
        $dns = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->connection = new PDO($dns, $this->user, $this->password, $this->opt);
    }

    public function disconnect()
    {
        $this->connection = null;
    }
    public function query($sql, $params = [])
    {
        $this->connect();
        $stmt = $this->connection->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        $this->disconnect();
        return $stmt;
    }

    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
    public function array($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchall(PDO::FETCH_COLUMN);
    }
    public function fetchProduct($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        $products = array();
        while ($row =  $statement->fetchObject('application\components\Product'))
            $products[] = $row;
        return $products;
    }

}
