<?php

require_once dirname(__FILE__)."/../config.php";

class BaseDao{
    protected $connection;
    function __construct()
    {
        try
        {
            $this->connection = new PDO("mysql:host=" .Config::DB_HOST. ";dbname=".Config::DB_SCHEME, Config::DB_USERNAME, Config::DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } 
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($query,$params)
    {
        $stmt= $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query_unique($query, $params)
    {
        $results=$this->query($query, $params);
        return reset($results);
    }

    public function update($table, $id, $entity, $id_column = "id")
    {
        $sql="UPDATE {$table} SET ";
        foreach($entity as $key => $value)
        {
            $sql.= $key ." = :" .$key . ", ";
        }
        $sql=substr($sql, 0, -2);
        $sql.=" WHERE {$id_column} = :id";
        $stmt=$this->connection->prepare($sql);
        $entity['id']=$id;
        $stmt->execute($entity);
    }

    public function insert($table, $entity)
    {
        $sql="INSERT INTO {$table} (";
        foreach($entity as $key => $pair)
        {
            $sql.="{$key}, ";
        }
        $sql=substr($sql, 0, -2);
        $sql.=") VALUES (";
        foreach($entity as $key => $pair)
        {
        $sql.=":{$key}, ";
        }
        $sql=substr($sql, 0, -2);
        $sql.=")";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute($entity);
    }
}