<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/18/16
 * Time: 11:26 AM
 */
use computercentre\controllers\UserController;
require_once 'app/bootstrap.php';

if(empty($_GET['controller']) OR empty($_GET['action'])){

    $user = new UserController();
    $user->login();

}

// Get controller and method names
$controller = $_GET['controller'];
$method = $_GET['action'];

// Instantiate controller object
$class = "computercentre\\controllers\\".$controller;
$user = new $class();



if(!empty($_POST)){
    $params['username'] = $_POST['username'];
    $params['passwd'] = $_POST['passwd'];
    $params['department_id'] = $_POST['department_id'];
}else{
    $params = [];
}

// Call method on you controller object
call_user_func_array(array($user, $method), $params);

