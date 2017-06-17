<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SB Admin </title>

    <?php echo Html::style('css/bootstrap.min.css'); ?>

    <?php echo Html::style('css/metisMenu.min.css'); ?>

    <?php echo Html::style('css/sb-admin-2.css'); ?>

    <?php echo Html::style('css/font-awesome.min.css'); ?>


</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Gestión de Quiniela</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo Auth::user()->username; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL::to('/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Equipos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo URL::to('/equipo/create'); ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::to('create_solo'); ?>"><i class='fa fa-plus fa-fw'></i>Agregar Solo</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::to('/equipo'); ?>"><i class='fa fa-list-ol fa-fw'></i> Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gamepad fa-fw"></i> Partidos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo URL::to('/partido/create'); ?>"><i class='fa fa-plus fa-fw'></i> Fase Grupo</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::to('/agregar'); ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::to('/agregar_directo'); ?>"><i class='fa fa-plus fa-fw'></i> Agregar Directo</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::to('/partido'); ?>"><i class='fa fa-list-ol fa-fw'></i> Listar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-futbol-o fa-fw"></i> Resultados<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo URL::to('/resultado_A/create'); ?>"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::to('/resultado_A'); ?>"><i class='fa fa-list-ol fa-fw'></i> Listar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                          
                            <a href="<?php echo URL::to('/posicion'); ?>"><i class='fa fa-history fa-fw'></i> Posiciones</a
                
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-smile-o" aria-hidden="true"></i> Personas Inscritas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo URL::to('/showUsersRegistered'); ?>"><i class='fa fa-list-ol fa-fw'></i> Listar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                          
                            <a href="<?php echo URL::to('/quiniela'); ?>"><i class='fa fa-paper-plane fa-fw'></i> Regresar</a>
                
                        </li>



                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
        
        <?php echo $__env->yieldContent('content'); ?>
            
        </div>

    </div>
    

    <?php echo Html::script('js/jquery.min.js'); ?>

    <?php echo Html::script('js/bootstrap.min.js'); ?>

    <?php echo Html::script('js/metisMenu.min.js'); ?>

    <?php echo Html::script('js/sb-admin-2.js'); ?>

    

</body>

</html>