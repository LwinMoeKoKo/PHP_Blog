<?php
require("vendor/autoload.php"); 
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\PostsTable;
use Libs\Database\UsersTable;
// print "<pre>";
// print_r($_SESSION);
// exit();    
$auth = Auth::adminCheck();
// if(empty($_GET['pageNo'])){
//   unset($_COOKIE['search']);
//   setcookie('search','',time()-1,"/");
// }
$table1 =new PostsTable(new MySQL());

$table = new UsersTable(new MySQL());

if(isset($_POST['title'])){
  setcookie("title",$_POST['title'],time()+86400,"/");
}  else {
  if(!isset($_GET['pageNo'])){
   setcookie("title","",time()-1,"/");
  }
};

if(isset($_GET['pageNo'])){
  $pageN0 = $_GET['pageNo'];
} else {
  global $pageN0;
  $pageNO = 1;
}
  
if(!isset($_POST['title']) && !isset($_COOKIE['title'])){
  $allPosts = $table->getPosts();
   $pageN0 = 1;
 
  $numOfRecords = 5;
  $offset= ($pageN0 - 1) * $numOfRecords;
  $totalPages = ceil(count($allPosts) / $numOfRecords);
  
  $limitPosts = $table->getPostsLimit($offset, $numOfRecords);

  $token = $table1->tokenCsrf();
} else {
  $title = $_POST['title'] ?? $_COOKIE['title'];
  $pageN0 = 1;

  $allPosts = $table->searchPost($title);   
 
  $numOfRecords = 2;
  $offset= ($pageN0 - 1) * $numOfRecords;
  $totalPages = ceil(count($allPosts) / $numOfRecords);
  
  $limitPosts = $table->searchPostLimit($offset, $numOfRecords,$title);
}
 
  

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
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
          <form class="form-inline" action="admin.php" method="post">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="title" type="search" placeholder="Search Blogs" aria-label="Search">
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
          <a href="#" class="d-block">Admin <?= $table1->h($auth->name)  ?></a>
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
              <i class="nav-icon fas fa-th"></i>
              <p>
                Blogs
                <span class="right badge badge-danger"><?= count($allPosts) ?></span>
              </p>
            </a>
          </li>
            <li class="nav-item">
              <a href="usersTable.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Admins & Users</p>
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
                <i class="nav-icon fas fa-user-plus"></i>
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
                


            <h1 class="my-3">Blog Page</h1>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Posts   <span class="right badge badge-danger ms-2"><?= count($allPosts) ?></span></h3>
                <a href="create.php" class="btn btn-outline-success float-right">Create Post</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if(isset($_GET['createSuccess'])): ?>
                        <div class="alert alert-success">Your Post created successfully. </div>
                <?php endif ?>         
                <?php if(isset($_GET['notFound'])): ?>
                        <div class="alert alert-primary">Post is not found on database. </div>
                <?php endif ?>
                <?php if(isset($_GET['delete'])): ?>
                        <div class="alert alert-secondary">Post deleted successfully. </div>
                <?php endif ?>         
                <?php if(isset($_GET['editSuccess'])): ?>
                        <div class="alert alert-success">Your Post edited successfully. </div>
                <?php endif ?> 
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px"><i class="fas fa-hashtag"></i></th>
                      <th><i class="fab fa-dailymotion me-1"></i>Title</th>
                      <th><i class="fas fa-newspaper me-1"></i>Content</th>
                      <th style="width: 40px"><i class="fas fa-edit me-1">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $i =1 ?>
                    <?php foreach($limitPosts as $post): ?>
                    <tr>
                      <td><?= $i ?> </td>
                      <td><?= $table1->h($post->title) ?></td>
                      <td><?= $table1->h(substr($post->content,0,70))   ?>...</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="edit.php?id=<?= $post->id ?>" class="btn btn-dark">Edit</a>
                          <a href="actions/delete.php?id=<?= $post->id ?>&csrf=<?= $token ?>" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++ ?>  
                    <?php endforeach ?>
                  </tbody>
                </table>
                <nav class="float-right mt-2">
                  <ul class="pagination">
                    <li class="page-item "><a href="admin.php?pageNo=1" class="page-link">First</a></li>
                    <li class="page-item <?php if($pageN0 <= 1) echo "disabled" ?>">
                      <a href="admin.php<?php if($pageN0 <= 1) {echo "#";} else { print("?pageNo=".$pageN0-1);} ?>" class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link"><?= $pageN0 ?></a></li>
                    <li class="page-item <?php if($pageN0 >= $totalPages) echo "disabled" ?>">
                      <a href="admin.php <?php if($pageN0 >= $totalPages) {echo "#";} else { print("?pageNo=".$pageN0+1);} ?>"  class="page-link">Next</a>
                    </li>
                    <li class="page-item"><a href="admin.php?pageNo=<?= $totalPages ?>" class="page-link">Last</a></li>
                  </ul>
                </nav>
              </div>
              <!-- /.card-body -->
            </div>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

                    

  


  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right">
      Blog App
    </div>
    <!-- Default to the left -->
    <div class="float-left">
      <strong>Copyright &copy; 2024 <a href="#">AdminLwinKo</a>.</strong> All rights reserved.
    </div>
  </footer>
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


