<?php
use computercentre\session\Session;
use computercentre\controllers\UserController;
use computercentre\controllers\StudentController AS Student;

require_once '../app/bootstrap.php';


//Session::init();

if(Session::read('Auth') == null){
    $user = new UserController();
    $user->login();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Dashboard</title>

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
            <a href="#" id="logo-container" class="brand-logo">SCS</a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="#intro">Add Card Record</a></li>
                    <li><a href="#work">List All Record</a></li>
                    <li><a href="#team">Logout</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#intro">Add Card Record</a></li>
                    <li><a href="#work">List All Record</a></li>
                    <li><a href="#team">Logout</a></li>
                </ul>

            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!--Hero
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>System</span>
            <span class="cd-words-wrapper waiting">
                <b class="is-visible">Login</b>
            </span>
        </h1>




    </div>
</div>
-->
<!-- Content Area -->
<div class="row">
    <div class="container">
        <div class="row">
            <h1>Dashboard</h1>
            <?php
                if(!empty($_POST)){
                    $params = $_POST;
                }else{
                    $params = [];
                }
                if(!empty($_GET['controller']) AND !empty($_GET['action'])){
                    // Get controller and method names
                    $controller = $_GET['controller'];
                    $method = $_GET['action'];

                    // Instantiate controller object
                    $class = "computercentre\\controllers\\".$controller;
                    $user = new $class();

                    // Call method on you controller object
                    call_user_func_array(array($user, $method), $params);
                }

            ?>
        </div>
        <div class="row">

            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Student Stats</span>
                    </div>
                    <div class="card-action">
                        <a href="#">Female : <?php echo Student::totalFemaleStudents();?></a>
                        <a href="#">Male : <?php echo Student::totalMaleStudents();?></a>
                        <a href="#">Total : <?php echo Student::totalStudents(); ?></a>
                    </div>
                </div>
            </div> <!-- col -->

            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Print Reports</span>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>

        </div><!-- row -->

    </div> <!-- container -->
</div> <!-- row -->
<!-- Content Area Ends -->

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
