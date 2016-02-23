<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/22/16
 * Time: 1:45 PM
 */

namespace computercentre\controllers;


use computercentre\models\Student;
use computercentre\session\Session;

class StudentController extends Controller{


    public static function totalStudents(){

        $students = new Student();
        $data = $students->countAllConditional('students', ['department_id', Session::read('Department_id')]);

        if(empty($data)){
            return 0;
        }

        return $data['count'];

    }

    public static function totalMaleStudents(){
        $student = new Student();
        $students = $student->countAllConditional('students', ['gender' => 'm', 'department_id' => Session::read('Department_id')]);

        if(empty($students)){
            return 0;
        }

        return $students['count'];
    }

    public static function totalFemaleStudents(){

        $student = new Student();
        $students = $student->countAllConditional('students', ['gender' => 'f', 'department_id' => Session::read('Department_id')]);

        if(empty($students)){
            return 0;
        }

        return $students['count'];

    }
} 