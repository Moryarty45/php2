<?php

class DataBase
{

    use Singleton;
    private $mysqli;

    private function __construct()
    {
        $this->mysqli = new mysqli(HOST, USER, PASS, DB);
        $this->mysqli->query("SET lc_time_names = 'ru_RU'");
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    public function select($query, $params = false)
    {
        $result_set = $this->mysqli->query($query, $params);
        if (!$result_set) return false;
        return $this->resultSetToArray($result_set);
    }

    private function resultSetToArray($result_set)
    {
        $array = array();
        while (($row = $result_set->fetch_assoc()) != false) {
            $array[] = $row;
        }
        return $array;
    }

    public function selectRow($query, $params = false)
    {
        $result_set = $this->mysqli->query($query, $params);
        if ($result_set->num_rows != 1) return false;
        else return $result_set->fetch_assoc();
    }

    public function selectCell($query, $params = false)
    {
        $result_set = $this->mysqli->query($query, $params);
        if ((!$result_set) || ($result_set->num_rows != 1)) return false;
        else {
            $arr = array_values($result_set->fetch_assoc());
            return $arr[0];
        }
    }

    public function query($query, $params = false)
    {
        $success = $this->mysqli->query($query, $params);
        if ($success) {
            if ($this->mysqli->insert_id === 0) return true;
            else return $this->mysqli->insert_id;
        } else return false;
    }

    public function __destruct()
    {
        if ($this->mysqli) $this->mysqli->close();
    }
}