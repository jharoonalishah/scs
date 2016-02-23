<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/18/16
 * Time: 11:26 AM
 */

namespace computercentre\controllers;
use computercentre\layout\Layout;
use computercentre\models\User;
use computercentre\session\Session;
use computercentre\config\Entity;

class UserController extends Controller{

    public function login(){
        Layout::setLoginLayout();
    }

    public function authenticate($username, $password, $department){

        $params['username'] = $username;
        $params['passwd'] = $password;
        $params['department_id'] = $department;

        $user = new User();
        $data = $user->find(Entity::getTableName('User'),$params);

        if(is_array($data) AND !empty($data)){

            Session::write('Auth', $data['username']);
            Session::write('Id', $data['id']);
            Session::write('Department_id', $data['department_id']);

            // If Admin is logged in
            if($data['id'] == 1){
                Session::write('Admin', 'true');
            }else{
                Session::write('Admin', 'false');
            }

            Layout::setDashboardLayout();
        }else{
            Session::init();
            Session::write('ErrorMsg', 'Login failed !!');
            Layout::setLoginLayout();
        }


    }


} 