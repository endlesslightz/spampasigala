<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Aplikasi Administratif Spam Pasigala untuk monitoring tekanan air">
    <meta name="keywords" content="Spam Pasigala, Kota Palu, Sulawesi, Administrator">
    <meta name="author" content="Nurcahya Pradana">
    <title>Aplikasi Administratif Spam Pasigala</title>

    <!-- Favicons-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/backend/images/favicon/pu.jpg" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/backend/images/favicon/pu.jpg">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/backend/images/favicon/pu.jpg">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="<?php echo base_url(); ?>assets/backend/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/backend/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url(); ?>assets/backend/css/custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">



    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo base_url(); ?>assets/backend/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="<?php echo base_url(); ?>assets/backend/images/logo.png" alt="PU logo"></a> <span class="logo-text">SPAM PASIGALA</span></h1></li>
                    </ul>
                  
                    <ul class="right hide-on-med-and-down">
                        
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="<?php echo site_url('login/logout'); ?>" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-action-exit-to-app"></i>
                        </a></li>  
                    </ul>
                 
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">

                        <?php if($this->session->userdata('gambar')==""){ ?>
                        <img src="<?php echo base_url(); ?>assets/backend/images/user.png" alt="" class="circle responsive-img valign profile-image">
                        <?php } else { ?>
                         <img src="<?php echo base_url(); ?>assets/backend/profile/<?php echo $this->session->userdata('gambar'); ?>" alt="" class="circle responsive-img valign profile-image">
                        <?php } ?>

                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="<?php echo site_url('backend/user/profile'); ?>"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <!-- <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                            </li>
                            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                            </li> -->
                            <li><a href="<?php echo site_url('login/logout'); ?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $this->session->userdata('nama'); ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal">Administrator</p>
                    </div>
                </div>
            </li>
                
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">

                        <li class="bold <?php if($link=='dashboard') echo 'active'; ?>"><a href="<?php echo site_url('backend/dashboard'); ?>" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                        </li>
                       <li class="bold <?php if($link=='email') echo 'active'; ?>"><a href="<?php echo site_url('backend/email'); ?>" class="waves-effect waves-cyan "><i class="mdi-communication-email"></i> Impor Data</a>
                        </li>
                        <li class="bold <?php if($link=='manual') echo 'active'; ?>"><a href="<?php echo site_url('backend/manual'); ?>" class="waves-effect waves-cyan"><i class="mdi-av-my-library-books"></i> Manual Book</a>
                        </li>
                        <li class="bold <?php if($link=='about') echo 'active'; ?>"><a href="<?php echo site_url('backend/about'); ?>" class="waves-effect waves-cyan" ><i class="mdi-communication-live-help"></i> Bantuan</a>
                        </li>
                      <!--   <li><a ><i class="mdi-action-swap-vert-circle"></i> Changelogs</a>
                        </li>  -->
                    </ul>
                </li>                   
            </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
