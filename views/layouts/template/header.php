<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pagina Principal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta']; ?>apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>normalize.css">
        <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>main.css">
        <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap.min.css">
        <script src="<?php echo $_layoutParams['ruta_js']; ?>modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-sm-8 col-md-12"><h1>Gestion de tareas</h1></div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <nav>
                    <ul>
                        <li><a href="<?php echo APP_URL; ?>">Inicio</a></li>
                        <li><a href="<?php echo APP_URL."tareas"; ?>">Tareas</a></li>
                        <li><a href="<?php echo APP_URL."usuarios"; ?>">Usuarios</a></li>
                        <li><a href="<?php echo APP_URL."departamentos"; ?>">Departamentos</a></li>
                        <li><a href="<?php echo APP_URL."responsables"; ?>">Responsables</a></li>
                        <li><a href="<?php echo APP_URL."equipos"; ?>">Equipos</a></li>
                        <li><a href="<?php echo APP_URL."marcas"; ?>">Marcas</a></li>
                        <li><a href="<?php echo APP_URL."modelos"; ?>">Modelos</a></li>
                        <li><a href="<?php echo APP_URL."categorias"; ?>">Categorias</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                Bienvenido sergio
            </div>
        </div>

        
    