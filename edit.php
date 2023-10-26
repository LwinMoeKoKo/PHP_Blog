<?php
require("vendor/autoload.php"); 
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
// print "<pre>";
// print_r($_SESSION);
// exit();    
$auth = Auth::check();

$id = $_GET['id'];
$table = new UsersTable(new MySQL());

$post = $table->getPost($id);
// print "<pre>";
// print_r($id);
// print_r($post);
// exit();    

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Edit Post Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../phpCRUD/css/bootstrap.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BlogAdmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin <?= $auth->name ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fas fa-house-user"></i>
              <p>
                Blogs
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="create.php" class="nav-link">
                <i class="nav-icon fas fa-plus-circle"></i>
                <p>Create Post</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="addUser.php" class="nav-link">
                <i class="nav-icon fas fa-user-edit"></i>
                <p>Add user</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="actions/logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
              <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-danger w-50">
                        <div class="card-header">
                          <h3 class="card-title">Edit Post</h3>
                        </div>
                        <div class="card-body  bg-gradient">
                          <?php if(isset($_GET['success'])) : ?>
                          <div class="alert alert-success">Your Post successfully updated. </div>
                          <?php endif ?>
                          <form action="actions/edit.php" method="post" enctype="multipart/form-data">
                             <div class="mb-3">
                                 <label for="title" class="form-label">Title</label>
                                <textarea type="text" class="form-control" id="title"    name="title" cols="30" rows="1" >
                                 <?= $post->title ?>
                                </textarea>
                             </div>
                             <div class="mb-3">
                                <label for="content" class="form-label">Contents</label><br>
                                <textarea name="content" id="content" cols="30" rows="5"  class="form-control" ><?= $post->content ?></textarea>
                             </div>
                             <?php if("actions/photo/<?= $post->image ?>"): ?>
                                <img src="actions/photos/<?= $post->image ?>" alt="<?= $post->image ?>" class="img-thumbnail my-2" style="width: 150px; height: 150px;">
                             <?php endif ?>
                             <?php if(isset($_GET['error'])) : ?>
                              <div class="alert alert-danger">Your photo cannot be uploaded. </div>
                              <?php endif ?>
                             <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <i class="fas fa-file-image"></i>
                                </div>
                                <input type="file" class="form-control" name="image">
                                <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                             </div>
                             <button type="submit" class="btn btn-outline-danger">Edit</button>
                             <a href="admin.php" class="btn btn-outline-dark">Back</a>
                          </form>
                          
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  
                  
                </div>
                <!-- /.card-body -->
              </div>
            </div><!-- /.col -->
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
                


    <!-- /.content-header -->
    <!-- Main Footer -->
    <!-- <footer class="main-footer">
      <div class="float-right">
        Blog App
      </div> -->
      <!-- Default to the left -->
      <!-- <div class="float-left">
        <strong>Copyright &copy; 2024 <a href="#">AdminLwinKo</a>.</strong> All rights reserved.
      </div>
    </footer> -->
  </div>
  <!-- ./wrapper -->
  
  <!-- REQUIRED SCRIPTS -->
  
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../phpCRUD/js/bootstrap.bundle.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  </body>
  </html>

  




