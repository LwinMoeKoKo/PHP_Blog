<?php

include("vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());

// $id = $_GET['id'];


// $post = $table->getPost($id);
// print "<pre>";
// print($id);
// print_r($post);
// exit(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Widgets</title>

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
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="text-center">
            <h1>Widgets</h1>
          </div>
      </div><!-- /.container-fluid -->
    </section>
         

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo1.png" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo2.png" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo1.png" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <!-- /.col -->
          </div>
        <div class="row">
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo3.jpg" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo3.jpg" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo2.png" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <!-- /.col -->
          </div>
        <div class="row">
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo2.png" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo4.jpg" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <div class="col-md-4">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header text-center h4">
                   Blog Title
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="dist/img/photo4.jpg" alt="Photo">
  
                  <!-- <p>I took this photo this morning. What do you guys think?</p>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              </div>
            <!-- /.col -->
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
