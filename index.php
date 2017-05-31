<?php

require_once "vendor/autoload.php";
include "./config/config.php";

$class = "Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');
$target = isset($_GET['t']) ? $_GET['t'] : "index";
$getParams = isset($_GET['params']) ? $_GET['params'] : null;
$postParams = isset($_POST['params']) ? $_POST['params'] : null;
$params = [
    "get" => $getParams,
    "post" => $postParams
];
$page = (isset($_GET['c']) ? ucfirst($_GET['c']) : "My_phpmyAdmin");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page ?></title>

    <!-- Bootstrap -->
    <link href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./assets/css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper" <?php if (isset($_SESSION["id_user"])) {
    echo 'class="toggled"';
} ?> >

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Shortcuts</a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <nav class="navbar navbar-default navbar-fixed-top">
        <?php if (isset($_SESSION["id_user"])) { ?>
            <ul class="nav navbar-nav navbar-left">
                <li><a id="menu-toggle" style="cursor: pointer"><i class="zmdi zmdi-menu"
                                                                   style="font-size: 20px"></i></a></li>
            </ul>
        <?php } ?>
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Data API</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php if (isset($_SESSION["id_user"])) { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?c=logout">Deconnexion</a></li>
                    </ul> <?php } ?>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container-content">

        <?php

        if (class_exists($class, true)) {
            $class = new $class();
            if (in_array($target, get_class_methods($class)) && isset($_SESSION["id_user"])) {
                call_user_func_array([$class, $target], $params);
            } else {
                call_user_func([$class, "index"]);
            }
        } else {
            echo "404 - Error";
        }

        ?>
    </div>
</div>
<!-- /#wrapper -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>
