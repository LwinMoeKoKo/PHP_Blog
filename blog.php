<?php

include("vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\PostsTable;

$table = new UsersTable(new MySQL());
$postTable = new PostsTable(new MySQL());

$auth = Auth::check();

$allPosts = $table->getPosts();
// $id = $_GET['id'];
// print "<pre>";
// print_r($auth);
// exit(); 
$pageNo = 1;

if(isset($_GET['pageNo'])){
  global $pageNo;
  $pageNo = $_GET['pageNo'];
} else {
  $pageNo = 1;
}

$offset = 6;
$totalPage = ceil(count($allPosts) / $offset);
$start = ($pageNo - 1) * $offset;

$limitPost = $table->getPostsLimit($start,$offset);

$token = $postTable->tokenCsrf();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blogs Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <div class="navbar navbar-expand navbar-expand-md navbar-dark bg-red sticky-top">
    <div class="container-fluid">
      <div class="navbar-brand">My Blog</div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item">
          <a href="index.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </div>
   </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="text-center">
            <h1>Blogs Home Page </h1>
          </div>
      </div><!-- /.container-fluid -->
    </section>
         

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card">
          <div class="card-body">
            <div class="row">
              <?php foreach($limitPost as $post): ?>
              <div class="col-lg-4 col-md-6 col-12">
                <!-- Box Comment -->
                <div class="card card-widget card-indigo mb-3" style="height: 500px !important;">
                  <div class="card-header text-center h5 ">
                     <?= $postTable->h(substr($post->title,0,20))  ?>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <a href="<?= $post->id ?>">
                      <img class="img-fluid card-img img-thumbnail" src="actions/photos/<?= $post->image?>" alt="Photo" style="width: 100% !important;height: 250px !important;">
                    </a>
                    <div class="card-text mt-2"> <?= $postTable->h(substr($post->content,0,80))  ?></div>
                  </div>
                  <div class="card-footer">
                    <a href="blogDetail.php?id=<?= $post->id ?>" class="btn btn-outline-danger">Read More</a>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.card -->
              <?php endforeach ?>
            </div>
          </div>
          <ul class="pagination justify-content-center">
            <li class="page-item"><a href="?pageNo=1" class="page-link">First</a></li>
            <li class="page-item <?php if($pageNo <= 1)  echo "disabled"?>" >
              <a href="?pageNo=<?php if($pageNo <= 1){echo "#";} else { print($pageNo-1);}?>" class="page-link">Previous</a>
            </li>
            <li class="page-item"><a href="#" class="page-link"><?= $pageNo ?></a></li>
            <li class="page-item <?php if($pageNo >= $totalPage)  echo "disabled"?>">
              <a href="?pageNo=<?php if($pageNo >= $totalPage){echo "#";} else { print($pageNo+1);}?>" class="page-link">Next</a>
            </li>
            <li class="page-item">
              <a href="?pageNo=<?= $totalPage ?>" class="page-link">Last</a>
            </li>
          </ul>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
                  
              

    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px !important;">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
