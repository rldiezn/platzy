<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Hola Kunde</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    {!!Html::style('/plugins/jquery-polymaps/style.css')!!}
    {!!Html::style('/plugins/jquery-metrojs/MetroJs.css')!!}
    {!!Html::style('/plugins/shape-hover/css/demo.css')!!}
    {!!Html::style('/plugins/shape-hover/css/component.css')!!}
    {!!Html::style('/plugins/owl-carousel/owl.carousel.css')!!}
    {!!Html::style('/plugins/owl-carousel/owl.theme.css')!!}
    {!!Html::style('/plugins/pace/pace-theme-flash.css')!!}
    {!!Html::style('/plugins/jquery-slider/css/jquery.sidr.light.css')!!}
    {!!Html::style('/plugins/jquery-ricksaw-chart/css/rickshaw.css')!!}
    {!!Html::style('/plugins/Mapplic/mapplic/mapplic.css')!!}

    <!-- BEGIN CORE CSS FRAMEWORK -->
    {!!Html::style('/plugins/boostrapv3/css/bootstrap.min.css')!!}
    {!!Html::style('/plugins/boostrapv3/css/bootstrap-theme.min.css')!!}
    {!!Html::style('/plugins/font-awesome/css/font-awesome.css')!!}
    {!!Html::style('/css/animate.min.css')!!}
    {!!Html::style('/plugins/jquery-scrollbar/jquery.scrollbar.css')!!}

    <!-- END CORE CSS FRAMEWORK -->

    <!-- BEGIN CSS TEMPLATE -->
    {!!Html::style('/css/style.css')!!}
    {!!Html::style('/css/responsive.css')!!}
    {!!Html::style('/css/custom-icon-set.css')!!}
    {!!Html::style('/css/magic_space.css')!!}

    <!-- END CSS TEMPLATE -->

    <!-- Ionicons -->
    {!!Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')!!}
            <!-- Theme style -->
    {!!Html::style('/css/AdminLTE.min.css')!!}
    <!--Custom-->
    {!!Html::style('/css/custom.css')!!}

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation" style="display:none">
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
                <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" >
                        <div class="iconset top-menu-toggle-white"></div>
                    </a> </li>
            </ul>
            <!-- BEGIN LOGO -->
            <a href="index.html"><img src="/img/logo.png" class="logo" alt=""  data-src="/img/logo.png" data-src-retina="/img/logo2x.png" width="106" height="21"/></a>
            <!-- END LOGO -->
            <ul class="nav pull-right notifcation-center">
                <li class="dropdown" id="header_task_bar"> <a href="widgets.html" class="dropdown-toggle active" data-toggle="">
                        <div class="iconset top-home"></div>
                    </a> </li>
                <li class="dropdown" id="header_inbox_bar" > <a href="email.html" class="dropdown-toggle" >
                        <div class="iconset top-messages"></div>
                        <span class="badge" id="msgs-badge">2</span> </a></li>
                <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle">
                        <div class="iconset top-chat-white "></div>
                    </a> </li>
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav" >
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left">
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
                            <div class="iconset top-menu-toggle-dark" style="
            color: #0aa699;
            "></div>
                        </a> </li>
                </ul>
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="finances.html" class="" >
                            <div class="fa fa-usd fa-2x" style="
            color: #0aa699;
            "></div>
                        </a> </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks"> <a href="social.html" class="" >
                            <div class="fa fa-comment-o fa-2x" style="
            color: #0aa699;
            "></div>
                        </a> </li>
                    <li class="m-r-10 input-prepend inside search-form no-boarder"> <span class="add-on"> <span class="iconset top-search"></span></span>
                        <input name="" type="text"  class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right">
                <div class="chat-toggler"> <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
                        <div class="user-details">
                            <div class="username"> <span class="badge badge-important">3</span> <?php echo Auth::user()->name ?> <span class="bold"><?php echo Auth::user()->paterno ?></span> </div>
                        </div>
                        <div class="iconset top-down-arrow"></div>
                    </a>
                    <div id="notification-list" style="display:none">
                        <div style="width:300px">
                            <div class="notification-messages info">
                                <div class="user-profile"> <img src="/img/profiles/d.jpg"  alt="" data-src="/img/profiles/d.jpg" data-src-retina="/img/profiles/d2x.jpg" width="35" height="35"> </div>
                                <div class="message-wrapper">
                                    <div class="heading"> David Nester - Commented on your wall </div>
                                    <div class="description"> Meeting postponed to tomorrow </div>
                                    <div class="date pull-left"> A min ago </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="notification-messages danger">
                                <div class="iconholder"> <i class="icon-warning-sign"></i> </div>
                                <div class="message-wrapper">
                                    <div class="heading"> Server load limited </div>
                                    <div class="description"> Database server has reached its daily capicity </div>
                                    <div class="date pull-left"> 2 mins ago </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="notification-messages success">
                                <div class="user-profile"> <img src="/img/profiles/h.jpg"  alt="" data-src="/img/profiles/h.jpg" data-src-retina="/img/profiles/h2x.jpg" width="35" height="35"> </div>
                                <div class="message-wrapper">
                                    <div class="heading"> You haveve got 150 messages </div>
                                    <div class="description"> 150 newly unread messages in your inbox </div>
                                    <div class="date pull-left"> An hour ago </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-pic"> <img src="<?php echo Auth::user()->img_profile ?>"  alt="" data-src="<?php echo Auth::user()->img_profile ?>" data-src-retina="/img/profiles/avatar_small2x.jpg" width="35" height="35" /> </div>
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                            <div class="fa fa-power-off fa-2x " style="
            color: #0aa699;
            "></div>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                            <li><a href="user-profile.html"> My Account</a> </li>
                            <li><a href="calender.html">My Calendar</a> </li>
                            <li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a> </li>
                            <li class="divider"></li>
                            <li><a href="logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks"> <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" >
                            <div class="fa fa-comments fa-2x " style="
            color: #0aa699;
            "><span class="badge badge-important hide" id="chat-message-count">1</span></div>
                        </a>
                        <div class="simple-chat-popup chat-menu-toggle hide" >
                            <div class="simple-chat-popup-arrow"></div>
                            <div class="simple-chat-popup-inner">
                                <div style="width:100px">
                                    <div class="semi-bold">David Nester</div>
                                    <div class="message">Hey you there </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar mini" id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">
            <div class="user-info-wrapper">
                <div class="profile-wrapper"> <img src="<?php echo Auth::user()->img_profile ?>"  alt="" data-src="<?php echo Auth::user()->img_profile ?>" data-src-retina="/img/profiles/avatar2x.jpg" width="69" height="69" /> </div>
                <div class="user-info">
                    <div class="greeting" style="
        color: #4bc8ac;
        font-weight: lighter;
        font-size: 16px;
        ">Hola te extrañamos!</div>
                    <div class="username" style="
        font-weight: lighter;
        "><?php echo Auth::user()->name ?> <span class="semi-bold" style="
        font-weight: lighter;
        "><?php echo Auth::user()->paterno ?></span></div>
                    <div class="status"> <?php echo Auth::user()->puesto ?> <a href="#"><br>
                            <div class="status-icon green"></div>
                            En Línea </a></div>
                </div>
            </div>
            <!-- END MINI-PROFILE -->
            <!-- BEGIN SIDEBAR MENU -->
            <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
            <ul>
                <li class="start active open "> <a href="index.html"> <i class="fa fa-pie-chart"></i> <span class="title">Marketing</span> <span class="selected"></span> <span class="arrow open"></span> </a>
                    <ul class="sub-menu">
                        <li > <a href="dashboard_v1.html"> Dashboard v1 </a> </li>
                        <li class="active"> <a href="index.html "> Dashboard v2 <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
                    </ul>
                </li>
                <li class=""> <a href="widgets.html"> <i class="fa fa-usd"></i> <span class="title">Finanzas</span> <span class="label label-important pull-right ">HOT</span></a> </li>
                <!--li class=""> <a href="email.html"> <i class="fa fa-envelope"></i> <span class="title">Email</span> <span class=" badge badge-disable pull-right ">203</span></a> </li-->
                <li class=""> <a href="../../frontend/index.html"> <i class="fa fa-flag"></i>  <span class="title">ESN</span></a></li>
                <li class=""> <a href="javascript:;"> <i class="fa fa fa-adjust"></i> <span class="title">360º</span> <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                        <li > <a href="theme_coporate.html">Coporate </a> </li>
                        <li > <a href="theme_simple.html">Simple</a> </li>
                        <li > <a href="theme_elegant.html">Elegant</a> </li>
                    </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="fa fa-user"></i> <span class="title">Mi Espacio</span> <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                        <li > <a href="layout_options.html"> Layout Options </a> </li>
                        <li > <a href="boxed_layout.html">Boxed Layout </a> </li>
                        <li > <a href="boxed_layout_v2.html">Inner Boxed Layout </a> </li>
                        <li > <a href="extended_layout.html">Extended Layout</a> </li>
                        <li > <a href="RTL.html">RTL Layout</a> </li>
                        <li > <a href="horizontal_menu.html">Horizontal Menu</a> </li>
                        <li > <a href="horizontal_menu_boxed.html">Horizontal Menu & Boxed</a> </li>
                    </ul>
                </li>
                <!--li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">UI Elements</span> <span class="arrow "></span> </a>
                  <ul class="sub-menu">
                    <li > <a href="typography.html"> Typography </a> </li>
                    <li > <a href="messages_notifications.html"> Messages & Notifications </a> </li>
                    <li > <a href="notifications.html"> Notifications </a> </li>
                    <li > <a href="icons.html">Icons</a> </li>
                    <li > <a href="buttons.html">Buttons</a> </li>
                    <li > <a href="tabs_accordian.html"> Tabs & Accordions </a> </li>
                    <li > <a href="sliders.html">Sliders</a> </li>
                    <li > <a href="group_list.html">Group list </a> </li>
                  </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-form"></i> <span class="title">Forms</span> <span class="arrow "></span> </a>
                  <ul class="sub-menu">
                    <li > <a href="form_elements.html">Form Elements </a> </li>
                    <li > <a href="form_validations.html">Form Validations</a> </li>
                  </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-portlets"></i> <span class="title">Grids</span> <span class="arrow "></span> </a>
                  <ul class="sub-menu">
                    <li > <a href="grids_simple.html">Simple Grids</a> </li>
                    <li > <a href="grids_draggable.html">Draggable Grids </a> </li>
                  </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-thumb"></i> <span class="title">Tables</span> <span class="arrow "></span> </a>
                  <ul class="sub-menu">
                    <li > <a href="tables.html"> Basic Tables </a> </li>
                    <li > <a href="datatables.html"> Data Tables </a> </li>
                  </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-map"></i> <span class="title">Maps</span> <span class="arrow "></span> </a>
                  <ul class="sub-menu">
                    <li > <a href="google_map.html"> Google Maps </a> </li>
                    <li > <a href="vector_map.html"> Vector Maps </a> </li>
                  </ul>
                </li>
                <li class=""> <a href="charts.html"> <i class="icon-custom-chart"></i> <span class="title">Charts</span> </a> </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-extra"></i> <span class="title">Extra</span> <span class="arrow "></span> </a>
                  <ul class="sub-menu">
                    <li > <a href="user-profile.html"> User Profile </a> </li>
                    <li > <a href="time_line.html"> Time line </a> </li>
                    <li > <a href="support_ticket.html"> Support Ticket </a> </li>
                    <li > <a href="gallery.html"> Gallery</a> </li>
                    <li class=""><a href="calender.html"> Calendar</a> </li>
                    <li > <a href="search_results.html"> Search Results </a> </li>
                    <li > <a href="invoice.html"> Invoice </a> </li>
                    <li > <a href="404.html"> 404 Page </a> </li>
                    <li > <a href="500.html"> 500 Page </a> </li>
                    <li > <a href="blank_template.html"> Blank Page </a> </li>
                    <li > <a href="login.html"> Login </a> </li>
                    <li > <a href="login_v2.html">Login v2</a> </li>
                    <li > <a href="lockscreen.html"> Lockscreen </a> </li>
                  </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="fa fa-folder-open"></i> <span class="title">Menu Levels</span> <span class="arrow "></span> </a>
                  <ul class="sub-menu">
                    <li > <a href="javascript:;"> Level 1 </a> </li>
                    <li > <a href="javascript:;"> <span class="title">Level 2</span> <span class="arrow "></span> </a>
                      <ul class="sub-menu">
                        <li > <a href="javascript:;"> Sub Menu </a> </li>
                        <li > <a href="ujavascript:;"> Sub Menu </a> </li>
                      </ul>
                    </li>
                  </ul>
                </li-->
                <li class="hidden-lg hidden-md hidden-xs" id="more-widgets" > <a href="javascript:;"> <i class="fa fa-plus"></i></a>
                    <ul class="sub-menu">
                        <li class="side-bar-widgets">
                            <p class="menu-title">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="icon-plus"></i></a></span></p>
                            <ul class="folders" >
                                <li><a href="#">
                                        <div class="status-icon green"></div>
                                        My quick tasks </a> </li>
                                <li><a href="#">
                                        <div class="status-icon red"></div>
                                        To do list </a> </li>
                                <li><a href="#">
                                        <div class="status-icon blue"></div>
                                        Projects </a> </li>
                                <li class="folder-input" style="display:none">
                                    <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" id="folder-name">
                                </li>
                            </ul>
                            <p class="menu-title">PROJECTS </p>
                            <div class="status-widget">
                                <div class="status-widget-wrapper">
                                    <div class="title">Freelancer<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                                    <p>Redesign home page</p>
                                </div>
                            </div>
                            <div class="status-widget">
                                <div class="status-widget-wrapper">
                                    <div class="title">envato<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                                    <p>Statistical report</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="side-bar-widgets">
                <p class="menu-title">FOLDER <span class="pull-right"><a href="#" class="create-folder"> <i class="fa fa-plus"></i></a></span></p>
                <ul class="folders" >
                    <li><a href="#">
                            <div class="status-icon green"></div>
                            My quick tasks </a> </li>
                    <li><a href="#">
                            <div class="status-icon red"></div>
                            To do list </a> </li>
                    <li><a href="#">
                            <div class="status-icon blue"></div>
                            Projects </a> </li>
                    <li class="folder-input" style="display:none">
                        <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" >
                    </li>
                </ul>
                <p class="menu-title">PROJECTS </p>
                <div class="status-widget">
                    <div class="status-widget-wrapper">
                        <div class="title">Freelancer<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                        <p>Redesign home page</p>
                    </div>
                </div>
                <div class="status-widget">
                    <div class="status-widget-wrapper">
                        <div class="title">envato<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                        <p>Statistical report</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <a href="#" class="scrollup to-edge">Scroll</a>
    <div class="footer-widget" style="display:none">
        <div class="progress transparent progress-small no-radius no-margin">
            <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>
        </div>
        <div class="pull-right">
            <div class="details-status"> <span data-animation-duration="560" data-value="86" class="animate-number"></span>% </div>
            <a href="lockscreen.html"><i class="fa fa-power-off"></i></a></div>
    </div>
    <!-- END SIDEBAR -->

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content condensed">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        @yield("content")
    </div>
    <!-- BEGIN CHAT -->
    <div class="chat-window-wrapper">
        <div id="main-chat-wrapper" class="inner-content">
            <div class="chat-window-wrapper scroller scrollbar-dynamic" id="chat-users" >
                <div class="chat-header">
                    <div class="pull-left">
                        <input type="text" placeholder="search">
                    </div>
                    <div class="pull-right">
                        <a href="#" class="" ><div class="iconset top-settings-dark "></div> </a>
                    </div>
                </div>
                <div class="side-widget">
                    <div class="side-widget-title">group chats</div>
                    <div class="side-widget-content">
                        <div id="groups-list">
                            <ul class="groups" >
                                <li><a href="#"><div class="status-icon green"></div>Office work</a></li>
                                <li><a href="#"><div class="status-icon green"></div>Personal vibes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="side-widget fadeIn">
                    <div class="side-widget-title">favourites</div>
                    <div id="favourites-list">
                        <div class="side-widget-content" >
                            <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="/img/profiles/d.jpg" data-chat-user-pic-retina="/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                                <div class="user-profile">
                                    <img src="/img/profiles/d.jpg"  alt="" data-src="/img/profiles/d.jpg" data-src-retina="/img/profiles/d2x.jpg" width="35" height="35">
                                </div>
                                <div class="user-details">
                                    <div class="user-name">
                                        Jane Smith
                                    </div>
                                    <div class="user-more">
                                        Hello you there?
                                    </div>
                                </div>
                                <div class="user-details-status-wrapper">
                                    <span class="badge badge-important">3</span>
                                </div>
                                <div class="user-details-count-wrapper">
                                    <div class="status-icon green"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="/img/profiles/d.jpg" data-chat-user-pic-retina="/img/profiles/d2x.jpg" data-user-name="David Nester">
                                <div class="user-profile">
                                    <img src="/img/profiles/c.jpg"  alt="" data-src="/img/profiles/c.jpg" data-src-retina="/img/profiles/c2x.jpg" width="35" height="35">
                                </div>
                                <div class="user-details">
                                    <div class="user-name">
                                        David Nester
                                    </div>
                                    <div class="user-more">
                                        Busy, Do not disturb
                                    </div>
                                </div>
                                <div class="user-details-status-wrapper">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="user-details-count-wrapper">
                                    <div class="status-icon red"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-widget">
                    <div class="side-widget-title">more friends</div>
                    <div class="side-widget-content" id="friends-list">
                        <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="/img/profiles/d.jpg" data-chat-user-pic-retina="/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                            <div class="user-profile">
                                <img src="/img/profiles/d.jpg"  alt="" data-src="/img/profiles/d.jpg" data-src-retina="/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    Jane Smith
                                </div>
                                <div class="user-more">
                                    Hello you there?
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">

                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon green"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="/img/profiles/d.jpg" data-chat-user-pic-retina="/img/profiles/d2x.jpg" data-user-name="David Nester">
                            <div class="user-profile">
                                <img src="/img/profiles/h.jpg"  alt="" data-src="/img/profiles/h.jpg" data-src-retina="/img/profiles/h2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    David Nester
                                </div>
                                <div class="user-more">
                                    Busy, Do not disturb
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon red"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="/img/profiles/d.jpg" data-chat-user-pic-retina="/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                            <div class="user-profile">
                                <img src="/img/profiles/c.jpg"  alt="" data-src="/img/profiles/c.jpg" data-src-retina="/img/profiles/c2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    Jane Smith
                                </div>
                                <div class="user-more">
                                    Hello you there?
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">

                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon green"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="/img/profiles/d.jpg" data-chat-user-pic-retina="/img/profiles/d2x.jpg" data-user-name="David Nester">
                            <div class="user-profile">
                                <img src="/img/profiles/h.jpg"  alt="" data-src="/img/profiles/h.jpg" data-src-retina="/img/profiles/h2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    David Nester
                                </div>
                                <div class="user-more">
                                    Busy, Do not disturb
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon red"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chat-window-wrapper" id="messages-wrapper" style="display:none">
                <div class="chat-header">
                    <div class="pull-left">
                        <input type="text" placeholder="search">
                    </div>
                    <div class="pull-right">
                        <a href="#" class="" ><div class="iconset top-settings-dark "></div> </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="chat-messages-header">
                    <div class="status online"></div><span class="semi-bold">Jane Smith(Typing..)</span>
                    <a href="#" class="chat-back"><i class="icon-custom-cross"></i></a>
                </div>
                <div class="chat-messages scrollbar-dynamic clearfix">
                    <div class="inner-scroll-content clearfix">
                        <div class="sent_time">Yesterday 11:25pm</div>
                        <div class="user-details-wrapper " >
                            <div class="user-profile">
                                <img src="/img/profiles/d.jpg"  alt="" data-src="/img/profiles/d.jpg" data-src-retina="/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    Hello, You there?
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="user-details-wrapper ">
                            <div class="user-profile">
                                <img src="/img/profiles/d.jpg"  alt="" data-src="/img/profiles/d.jpg" data-src-retina="/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    How was the meeting?
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="user-details-wrapper ">
                            <div class="user-profile">
                                <img src="/img/profiles/d.jpg"  alt="" data-src="/img/profiles/d.jpg" data-src-retina="/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    Let me know when you free
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="sent_time ">Today 11:25pm</div>
                        <div class="user-details-wrapper pull-right">
                            <div class="user-details">
                                <div class="bubble sender">
                                    Let me know when you free
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Sent On Tue, 2:45pm</div>
                        </div>
                    </div>
                </div>
                <div class="chat-input-wrapper" style="display:none">
                    <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- END CHAT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
{!!Html::script('/plugins/jquery-1.8.3.min.js')!!}
{!!Html::script('/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js')!!}
{!!Html::script('/plugins/boostrapv3/js/bootstrap.min.js')!!}
{!!Html::script('/plugins/breakpoints.js')!!}
{!!Html::script('/plugins/jquery-unveil/jquery.unveil.min.js')!!}
{!!Html::script('/plugins/jquery-block-ui/jqueryblockui.js')!!}
{!!Html::script('/plugins/jquery-lazyload/jquery.lazyload.min.js')!!}
{!!Html::script('/plugins/jquery-scrollbar/jquery.scrollbar.min.js')!!}
{{--<script src="/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/breakpoints.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>--}}
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->

{!!Html::script('/plugins/jquery-numberAnimate/jquery.animateNumbers.js')!!}
{!!Html::script('/plugins/jquery-ricksaw-chart/js/raphael-min.js')!!}
{!!Html::script('/plugins/jquery-ricksaw-chart/js/d3.v2.js')!!}
{!!Html::script('/plugins/jquery-ricksaw-chart/js/rickshaw.min.js')!!}
{!!Html::script('/plugins/jquery-sparkline/jquery-sparkline.js')!!}
{!!Html::script('/plugins/skycons/skycons.js')!!}
{!!Html::script('/plugins/jquery-ricksaw-chart/js/rickshaw.min.js')!!}
{!!Html::script('/plugins/jquery-sparkline/jquery-sparkline.js')!!}
{!!Html::script('/plugins/skycons/skycons.js')!!}
{!!Html::script('/plugins/owl-carousel/owl.carousel.min.js')!!}
{!!Html::script('http://maps.google.com/maps/api/js?sensor=true')!!}
{!!Html::script('/plugins/jquery-gmap/gmaps.js')!!}
{!!Html::script('/plugins/jquery-flot/jquery.flot.js')!!}
{!!Html::script('/plugins/jquery-flot/jquery.flot.resize.min.js')!!}
{!!Html::script('/plugins/jquery-metrojs/MetroJs.min.js')!!}
{!!Html::script('/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js')!!}
{!!Html::script('/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js')!!}
{!!Html::script('/plugins/Mapplic/js/jquery.easing.js')!!}
{!!Html::script('/plugins/Mapplic/js/jquery.mousewheel.js')!!}
{!!Html::script('/plugins/Mapplic/js/hammer.js')!!}
{!!Html::script('/plugins/Mapplic/mapplic/mapplic.js')!!}
{{--<script src="/plugins/pace/pace.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>--}}
{{--<script src="/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>--}}
{{--<script src="/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>--}}
{{--<script src="/plugins/jquery-sparkline/jquery-sparkline.js"></script>--}}
{{--<script src="/plugins/skycons/skycons.js"></script>--}}
{{--<script src="/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>--}}
{{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>--}}
{{--<script src="/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/shape-hover/js/snap.svg-min.js"></script>--}}
{{--<script src="/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>--}}
{{--<script src="/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>--}}
{{--<script src="/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN CORE TEMPLATE JS -->
{!!Html::script('/js/core.js')!!}
{!!Html::script('/js/chat.js')!!}
{!!Html::script('/js/demo.js')!!}
{!!Html::script('/js/widgets.js')!!}
{{--<script src="/js/core.js" type="text/javascript"></script>--}}
{{--<script src="/js/chat.js" type="text/javascript"></script>--}}
{{--<script src="/js/demo.js" type="text/javascript"></script>--}}
{{--<script src="/js/widgets.js" type="text/javascript"></script>--}}
<script type="text/javascript">
    $(document).ready(function () {
        $(".live-tile,.flip-list").liveTile();
    });

</script>
<!-- END CORE TEMPLATE JS -->
</body>
</html>
