<?php
use computercentre\controllers\DepartmentController;
use computercentre\session\Session;
require_once '../app/bootstrap.php';

    $department = new DepartmentController();
    $departmentList = $department->departmentList();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Student Card System - Login</title>

    <!-- CSS  -->
    <link href="../public/min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="../public/min/custom-min.css" type="text/css" rel="stylesheet" >


</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!--Navigation-->
 <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="#" id="logo-container" class="brand-logo">Student Card System</a>
                <!--
                <ul class="right hide-on-med-and-down">
                    <li><a href="#intro">Service</a></li>
                    <li><a href="#work">Work</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="https://github.com/joashp/material-design-template" target="_blank">Download</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#intro">Service</a></li>
                    <li><a href="#work">Work</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="https://github.com/joashp/material-design-template" target="_blank">Download</a></li>
                </ul>
                -->
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!--Hero-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>System</span>
            <span class="cd-words-wrapper waiting">
                <b class="is-visible">Login</b>
            </span>
        </h1>


        <!-- login form -->
        <div class="row">
        <div class="container">
            <div class="row">
                <?php $error = Session::read('ErrorMsg');?>
                <?php if(!empty($error)):?>
                <div class="card-panel teal lighten-2"><?php echo $error;?></div>
                <?php endif;?>
                <form class="col s12" action="/scs/index.php?controller=UserController&action=authenticate" method="post">
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="mdi-action-account-circle prefix white-text"></i>
                                <input id="icon_prefix" name="username" type="text" class="validate white-text">
                                <label for="icon_prefix" class="white-text">Login name</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="mdi-action-input prefix white-text"></i>
                                <input id="icon_passwd" name="passwd" type="password" class="validate white-text">
                                <label for="icon_passwd" class="white-text">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select class="white-text" name="department_id">
                                    <option value="" disabled selected>Choose your option</option>

                                    <?php for($i =0; $i < count($departmentList); $i++):?>
                                        <option value="<?php echo $departmentList[$i]['id'];?>"><?php echo $departmentList[$i]['department_name'];?></option>
                                    <?php endfor;?>

                                    <!--<option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>-->
                                </select>
                                <label class="white-text">Select Department</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col offset-s7 s5">
                                <button class="btn waves-effect waves-light red darken-1" type="submit">Submit
                                    <i class="mdi-content-send right white-text"></i>
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
        </div> <!-- container -->
            </div> <!-- row -->

    </div>
</div>

<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">

    <div class="footer-copyright default_color">
        <div class="container">
            Made by <a class="white-text" href="#">Computer Centre</a>
        </div>
    </div>
</footer>


    <!--  Scripts-->
    <script src="../public/min/plugin-min.js"></script>
    <script src="../public/min/custom-min.js"></script>


    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

    </body>
</html>
