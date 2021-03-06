<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="/assets/css/simple-sidebar.css" rel="stylesheet">
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
<!--<div id="wrapper" class="toggled">-->
<div id="wrapper" <?php if (isset($_SESSION["id_user"])) {
    echo 'class="toggled"';
} ?>>

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="<?php echo BASE_URL ?>">
                    My_phpmyadmin
                </a>
            </li>
            <li class="all-databases">
                <?php foreach ($sideMenu->arrayBdd as $bdd => $tables) { ?>
                    <div class="group-title-bdd">
                        <a <?php echo "href='#$bdd'" ?> class="icon-bdd" data-toggle="collapse">
                            <i class="zmdi zmdi-plus"></i>
                        </a>
                        <div class="title-bdd"><a <?php echo "href='".BASE_URL."/tables?dbname=".$bdd."'" ?>><?php echo $bdd ?></a></div>
                    </div>
                    <div class="collapse" <?php echo "id='$bdd'" ?> >
                        <?php foreach ($tables as $table) { ?>
                            <a <?php echo "href='".BASE_URL."/tableInfos?table=".$table."&bdd=".$bdd."'" ?> class="tables-bdd"><?php echo $table ?></a>
                        <?php }
                        ?> </div>
                    <?php
                } ?>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <nav class="navbar navbar-default navbar-fixed-top">
        <?php if (isset($_SESSION["id_user"])) { ?>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a id="menu-toggle" style="cursor: pointer">
                        <i class="zmdi zmdi-menu" style="font-size: 20px"></i>
                    </a>
                </li>
            </ul>
        <?php } ?>
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php if (isset($_SESSION["id_user"])) { ?>
                        <ul class="nav navbar-nav">
                            <li><a data-toggle="modal" data-target="#modal-sql"><i class="zmdi zmdi-file"></i> SQL</a></li>
                        </ul>
                    <?php } ?>
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION["id_user"])) { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo BASE_URL ?>/logout">Deconnexion</a></li>
                        </ul>
                    <?php } ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container-content">