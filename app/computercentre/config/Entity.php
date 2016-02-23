<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/19/16
 * Time: 11:18 AM
 */

namespace computercentre\config;


class Entity {

    private static $tableEntity = [
        'User' => 'users',
        'Department' => 'departments',
        'Student' => 'studentcards'
    ];

    public static function getTableName($tblName){

        return self::$tableEntity[$tblName];

    }

}