<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/18/16
 * Time: 1:51 PM
 */

namespace computercentre\models;
use computercentre\config\Connection;
use \PDO;
class Model {
    private $pdo = null;
    private $connection = null;

    public function __construct(){
        $this->connection = new Connection();
        $this->pdo = $this->connection->dbConnection();
    }

    /**
     * @param $tableName
     * @param $params
     * @return array
     *
     */
    public function find($tableName,$params){
        if($this->connection){

            if (!empty($params) && is_array($params)) {
                foreach ($params as $key => $value) {
                    $where[] = $key . " = " . $this->pdo->quote($value);
                }

            }

            if(empty($where)){
                $where = 1;
            }else{
                $where = implode(' AND ', $where);
            }

            $sql = sprintf("SELECT * FROM ".$tableName." WHERE %s", $where);

            $users = $this->pdo->query($sql);

            if($users->setFetchMode(PDO::FETCH_ASSOC) == null){
                return null;
            }

            return $user = $users->fetch();


        }

    }

    /**
     * @param $tblName
     * @return array
     *
     * Return all records
     */
    public function findAll($tblName){

        $sql = "SELECT * FROM " . $tblName;

        $result = $this->pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result = $result->fetchAll();

    }

    /**
     * @param $tblName
     * @param $id
     * @param $name
     * @return array
     *
     */
    public function selectList($tblName, $id, $name){

        $sql = "SELECT {$id}, {$name} FROM " . $tblName;

        $result = $this->pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result = $result->fetchAll();

    }

    public function insert(){

        /*$columns = implode(", ",array_keys($insData));
        $escaped_values = array_map('mysql_real_escape_string', array_values($insData));
        $values  = implode(", ", $escaped_values);
        $sql = "INSERT INTO `fbdata`($columns) VALUES ($values)";*/

    }

    public function countAll($tblName){

        $sql = "SELECT count(*) AS `count` FROM " . $tblName;

        $result = $this->pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result = $result->fetchAll();

    }

    public function countAllConditional($tblName, $params){
        if($this->connection){

            if (!empty($params) && is_array($params)) {
                foreach ($params as $key => $value) {
                    $where[] = $key . " = " . $this->pdo->quote($value);
                }

            }

            if(empty($where)){
                $where = 1;
            }else{
                $where = implode(' AND ', $where);
            }

            $sql = sprintf("SELECT count(*) AS `count` FROM ".$tblName." WHERE %s", $where);

            $users = $this->pdo->query($sql);

            if($users->setFetchMode(PDO::FETCH_ASSOC) == null){
                return null;
            }

            return $user = $users->fetch();


        }
    }
}