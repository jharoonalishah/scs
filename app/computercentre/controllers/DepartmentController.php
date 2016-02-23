<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/19/16
 * Time: 12:17 PM
 */

namespace computercentre\controllers;


use computercentre\config\Entity;
use computercentre\models\Department;

class DepartmentController extends Controller{

    public function departmentList(){

        $department = new Department();
        $list = $department->selectList(Entity::getTableName('Department'), 'id', 'department_name');

        return $list;

    }
} 