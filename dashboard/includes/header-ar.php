<?php
session_start();
include('conn.php');

$pagelink = basename($_SERVER['PHP_SELF']);
if($pagelink != "login.php")
{
    if(!isset( $_SESSION['kwAdmin'] ))
    {
        echo '<script type="text/javascript">
                location.replace("login.php");
              </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- App favicon -->
        <link rel="shortcut icon" href="../images/logo.png">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout="horizontal" class="">
        
       <!-- Top Bar Start -->
       <div class="topbar">  
            <!-- LOGO -->
            <div class="brand">
                <a href="index.php" class="logo">
                    <span>
         <img src="../images/logo.png" alt="logo-small" class="logo-sm"  width="110" height="70">
                    </span>

                </a>
            </div>
            <!--end logo-->  
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    <li class="dropdown hide-phone">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i data-feather="search" class="topbar-icon"></i>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg p-0">
                            <!-- Top Search Bar -->
                            <div class="app-search-topbar">
                                <form action="#" method="get">
                                    <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text...">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>                      

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="ms-1 nav-user-name hidden-sm">ADMIN</span>
                            <img src="assets/images/users/user-5.jpg" alt="profile-user" class="rounded-circle thumb-sm" />                                 
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="logout.php"><i data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i> Logout</a>
                        </div>
                    </li>
                    
                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link" id="mobileToggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a><!-- End mobile menu toggle-->
                    </li> <!--end menu item-->   
                </ul><!--end topbar-nav-->

                <div class="navbar-custom-menu">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            
                            <li class="has-submenu">
                                <a href="messages.php">                                
                                    <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Messages</span>
                                </a>
                            </li><!--end has-submenu-->
                            
                            
                            <li class="has-submenu">
                                <a href="#">                                
                                    <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Site</span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="site-contact.php">Contact Us</a>
                                    </li> <!--end has-submenu-->  
                                    <li class="">
                                        <a href="site-about.php">About Us</a>
                                    </li> <!--end has-submenu--> 
                                    <li class="">
                                        <a href="site-social.php">Social Media</a>
                                    </li> <!--end has-submenu--> 
                                    <li class="">
                                        <a href="site-home.php">Home</a>
                                    </li> <!--end has-submenu-->
                                </ul><!--end submenu-->
                            </li><!--end has-submenu-->
                            
                            <li class="has-submenu">
                                <a href="#">                                
                                    <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Products</span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="products-ar.php">All Products</a>
                                    </li> <!--end has-submenu-->  
                                    <li class="">
                                        <a href="products-add-ar.php">Add Products</a>
                                    </li> <!--end has-submenu-->  
                                </ul><!--end submenu-->
                            </li><!--end has-submenu-->
                            <li class="has-submenu">
                                <a href="#">                                
                                    <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Category</span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="category-ar.php">All Categories</a>
                                    </li> <!--end has-submenu-->  
                                    <li class="">
                                        <a href="category-add-ar.php">Add Category</a>
                                    </li> <!--end has-submenu-->  
                                </ul><!--end submenu-->
                            </li><!--end has-submenu-->
                            
                            <li class="has-submenu">
                                <a href="#">                                
                                    <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Admins</span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="admins.php">All Admins</a>
                                    </li> <!--end has-submenu-->  
                                    <li class="">
                                        <a href="admins-add.php">Add admin</a>
                                    </li> <!--end has-submenu-->  
                                </ul><!--end submenu-->
                            </li><!--end has-submenu-->
                            
                            <li class="has-submenu">
                                <a href="#">                                
                                    <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Users</span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="users.php">View Users</a>
                                    </li> <!--end has-submenu-->
                                    <li class="has-submenu">
                                        <a href="#">Representatives</a>
                                        <ul class="submenu">
                                            <li><a href="repre-add.php"><i class="ti ti-minus"></i>Add Representative</a></li>
                                            <li><a href="repre.php"><i class="ti ti-minus"></i>All Representatives</a></li>
                                        </ul>
                                    </li> <!--end has-submenu--> 
                                </ul><!--end submenu-->
                            </li><!--end has-submenu-->
                            
                            <li class="has-submenu">
                                <a href="#">                                
                                    <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Sales</span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="sales.php">View Sales</a>
                                    </li> <!--end has-submenu-->  
                                    <li class="">
                                        <a href="sales-add.php">Add Sale</a>
                                    </li> <!--end has-submenu--> 
                                </ul><!--end submenu-->
                            </li><!--end has-submenu-->
                            
                        </ul><!-- End navigation menu -->
                    </div> <!-- end navigation -->
                </div>
                <!-- Navbar -->
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                 