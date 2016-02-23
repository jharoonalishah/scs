<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/18/16
 * Time: 1:52 PM
 */

namespace computercentre\config;
use \PDO;

class Connection {
    /**
     * @var Singleton The reference to *Singleton* instance of this class
     */

    private $instance = null;


    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'student_card';

    // The db connection is established in the private constructor.
    public function dbConnection()
    {
        if($this->instance == null){
            $this->instance = new PDO(
                "mysql:host={$this->host};dbname={$this->name}",
                $this->user,$this->pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
            );

            return $this->instance;
        }
    }

    public function isConnected(){
        if(!empty($this->instance)){
            return true;
        }

        return false;
    }
}