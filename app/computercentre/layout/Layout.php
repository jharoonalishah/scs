<?php
/**
 * Created by PhpStorm.
 * User: haroon
 * Date: 2/18/16
 * Time: 11:31 AM
 */

namespace computercentre\layout;


class Layout {

    public function __construct(){}

    public static function setLoginLayout(){
        header("Location: ../../scs/views/login.php");
    }

    public static function setDashboardLayout(){
        @header("Location: ../../scs/views/dashboard.php");
    }


} 