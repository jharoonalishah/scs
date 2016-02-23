<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/18/16
 * Time: 11:57 AM
 */

namespace computercentre\session;


class Session {

    public static function init(){
        @session_start();
    }

    public static function write($name, $value){
        self::init();
        $_SESSION[$name] = $value;
    }

    public static function read($name){

        self::init();

        if(!empty($_SESSION[$name]))
            return $_SESSION[$name];

        return null;
    }

    public static function readAll(){

        self::init();

        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

    }
    public static function destroy($name){
        unset($_SESSION[$name]);
    }

    public static function truncate(){
        session_destroy();
    }
} 