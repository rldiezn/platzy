<!--
Author: Aarón Cortés
Product: Social Kunde "ESN"  versión 4.1.1
Powered by: BTouch Inc
A brand of Gruppo | Impero BTouch
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}
    <!-- Font Awesome -->
    {!!Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')!!}
    <!-- Ionicons -->
    {!!Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')!!}
    <!-- Theme style -->
    {!!Html::style('/css/AdminLTE.min.css')!!}
    <!-- Kunde Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!!Html::style('/css/skins/_all-skins.min.css')!!}
    {!!Html::style('/css/custom.css')!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {!!Html::script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')!!}
    {!!Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')!!}
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>K</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Social</b>Kunde</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <div>
                                    </div>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sarai Cortés
                                                <small><i class="fa fa-clock-o"></i> Hace un momento</small>
                                            </h4>
                                            <p>Ya aprobamos el pago para las tarjetas de presentación!!!</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Samuel Cortés
                                                <small><i class="fa fa-clock-o"></i> Hace 5 horas</small>
                                            </h4>
                                            <p>Te envío los archivos que te comente, saludos!</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sarai Cortés "Finanzas"
                                                <small><i class="fa fa-clock-o"></i> Ayer</small>
                                            </h4>
                                            <p>Hola chicos buen día, les comento que...</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Samuel Cortés
                                                <small><i class="fa fa-clock-o"></i> Hazce 2 dias</small>
                                            </h4>
                                            <p>Hola, me pasas el # de David Pereira porfa.</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 nuevos miembros
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Han publicado en Grupo "¿Qué es el neuromarketing?"
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 10 ventas hechas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-light-blue"></i> cambiaste tu contraseña
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Ver todo</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo Auth::user()->img_profile ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo Auth::user()->name ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo Auth::user()->img_profile ?>" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo Auth::user()->name ?> - <?php echo Auth::user()->puesto ?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Seguidores</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Siguiendo</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Compañeros</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Editar Cuenta</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa  fa-comments"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Auth::user()->img_profile ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo Auth::user()->name ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Buscar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Mi Espacio</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/Users/Sam/Desktop/kundegeneral/socialekunde/pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Noticias <small class="label pull-right bg-green">5</small></a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Muro</a></li>
                        <li ><a href="../pages/layout/boxed.html"><i class="fa fa-circle-o"></i>SocialIn</a></li>
                        <li><a href="../pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Mis archivos</a></li>
                        <li><a href="../../socialekunde/index2.html"><i class="fa fa-circle-o"></i> Ranking</a></li>
                    </ul>
                </li>

                <li>
                    <a href="../index3.html">
                        <i class="fa fa-users"></i> <span>Grupos</span> <small class="label pull-right bg-green">nuevo</small>
                    </a>
                </li>
                <li>
                    <a href="../index3.html">
                        <i class="fa fa-space-shuttle"></i> <span>Foros</span> <small class="label pull-right bg-green">nuevo</small>
                    </a>
                </li>
                <li>
                    <a href="../index3.html">
                        <i class="fa fa-quote-right"></i> <span>Blog</span> <small class="label pull-right bg-green">nuevo</small>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa  fa-chevron-circle-up"></i> <span>Explorar</span>

                    </a>

                </li>
                <li>
                    <a href="../pages/calendar.html">
                        <i class="fa fa-calendar"></i> <span>Mi Agenda</span>
                        <small class="label pull-right bg-red">3</small>
                    </a>
                </li>
                <li>
                    <a href="../mailbox/mailbox.html">
                        <i class="fa fa-envelope"></i> <span>E-mail</span>
                        <small class="label pull-right bg-yellow">12</small>
                    </a>
                </li>
                <li class="treeview">
                    <a href="../index5.html">
                        <i class="fa fa-rocket"></i> <span>Network</span>

                <li><a href="../../documentation/index.html"><i class="fa fa-flask"></i> <span>CRM</span></a></li>
                <li><a href="../../socialekunde/pages/examples/lockscreen.html"><i class="fa fa-toggle-off"></i> <span>Sleep</span></a></li>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield("content")
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> S beyond
        </div>
        <strong>2016 Powered by BTouch Inc. &copy; <a href="http://www.placeyourfinger.com.mx">Kunde a brand of Gruppo | Impero BTouch </a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa  fa-comments"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading" style="
            margin-bottom: 30px;
            ">Compañeros</h3>
                <ul class="control-sidebar-menu">
                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user4-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                Samuel Cortés
                                <i class="fa fa-circle text-success"></i>
                            </h5>


                    </li><!-- end message -->
                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user5-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                Ricardo Diez
                                <i class="fa fa-circle text-success"></i>
                            </h5>


                    </li><!-- end message -->

                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user9-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                Omar Paredes
                                <i class="fa fa-circle text-success"></i>
                            </h5>


                    </li><!-- end message -->


                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user10-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                Diego Lara
                                <i class="fa fa-circle text-success" style=" color:#f83c3c
                            "></i>
                            </h5>


                    </li><!-- end message -->


                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user3-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                Sarai Cortés
                                <i class="fa fa-circle text-success" style=" color:#f83c3c
                            "></i>
                            </h5>
                    </li><!-- end message -->


                    <li>
                        <div class="menu-info">
                        </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <div class="menu-info">
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="menu-info">
                        </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Proveedores</h3>
                <ul class="control-sidebar-menu">

                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user8-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                David Pereira
                                <i class="fa fa-circle text-success"></i>
                            </h5>


                    </li><!-- end message -->

                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user6-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                Miguel Maldonado
                                <i class="fa fa-circle text-success" style=" color:#f83c3c
                            "></i>
                            </h5>


                    </li><!-- end message -->

                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="{{asset('img/user7-128x128.jpg')}}" class="img-circle" alt="User Image" style="
                            height: 40px;
                            ">
                            </div>

                            <h5>
                                Maria Salgado
                                <i class="fa fa-circle text-success" style=" color:#f83c3c
                            "></i>
                            </h5>


                    </li><!-- end message -->

                    <li>
                        </a>
                    </li>
                    <li>
                        </a>
                    </li>
                    <li>
                        </a>
                    </li>
                    <li>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <div class="form-group">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                    </div><!-- /.form-group -->

                    <h3 class="control-sidebar-heading" style="
              margin-bottom: 25px;
              ">Ajustes</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Mostrarme En línea
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Apagar Notificaciones
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Borrar el historial de chat
                            <a href="javascript:;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
</body>
</html>

<!-- jQuery 2.1.4 -->
{!!Html::script('https://code.jquery.com/jquery-2.1.4.min.js')!!}
<!-- Bootstrap 3.3.5 -->
{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')!!}
<!-- Slimscroll -->
{!!Html::script('/js/slimScroll/jquery.slimscroll.min.js')!!}
<!-- FastClick -->
{!!Html::script('/js/fastclick/fastclick.min.js')!!}
<!-- AdminLTE App -->
{!!Html::script('/js/app.min.js')!!}
<!-- AdminLTE for demo purposes -->
{!!Html::script('/js/demo.js')!!}