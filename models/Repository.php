<?php

namespace app\models;

use app\engine\Db;

class Repository extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db =  Db::getInstance();
    }

    public function getWhereOne($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
        return $this->db->getInstance()->queryObject($sql, ["value" => $value], $this->getEntityClass());
    }

    public function insert($entity)
    {
        $params = [];
        $columns = [];

        foreach ($entity->state as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = "`$key`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));

        $tableName = $this->getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        $this->db->getInstance()->execute($sql, $params);

        $entity->id = $this->db->getInstance()->lastInsertId();
        return $entity;
    }

    public function delete($entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->getInstance()->execute($sql, ["id" => $entity->id]);
    }

    public function update($entity)
    {
        $tableName = $this->getTableName();
        $params = [];
        $columns = [];
        foreach ($entity->state as $key => $value) {
            if ($value) {
                $columns[] = $key. ' = ' . "'" .$this->$key. "'";
                $params[":{$key}"] = $this->$key;
            }
        }
        $columns = implode(", ", $columns);

        $sql = 'UPDATE ' .$tableName.' SET  '. $columns. '  WHERE id =' . $entity->id;

        $this->db->getInstance()->execute($sql,$params);

        $entity->clearState();
        return $entity;

    }

    public function save($entity)
    {
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    public function getLimit($from, $to)
    {
        $params = ['from'=> $from, 'to'=> $to];

        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT :from , :to";
        return $this->db->getInstance()->queryLimit($sql,$params);
    }

    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:value";
        return $this->db->getInstance()->queryOne($sql, ["value"=>$value])['count'];
    }



    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return $this->db->getInstance()->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return $this->db->getInstance()->queryAll($sql);
    }

}