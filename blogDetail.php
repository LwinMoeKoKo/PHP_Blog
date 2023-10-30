<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\PostsTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();
$authId = $auth->id;

$table = new UsersTable(new MySQL());

$blogId = $_GET['id'];

$post = $table->getPost($blogId);
$postId = $post->id;
$postTable = new PostsTable(new MySQL());
if($_POST){
  if(!($_POST['comment']) ){
    if(!(($_POST['comment']))){
      $commentNull = "Please fill the comment";
    }
 }  else {
   $comment = $_POST['comment'];
  
   $result = $postTable->insertComment($comment, $authId, $postId);
   if($result){
     HTTP::redirect("/blogDetail.php?id=$blogId");
   }
  }
 };


$allComments = $postTable->getComment($blogId);

// $author_id = $allComments[0]->author_id;
// $CommenterName = $postTable->getUser($author_id);
// $query = "SELECT * FROM users RIGHT JOIN comments ON users.id = comments.author_id;";

// print "<pre>";
// print_r($allComments);
// print_r($CommenterName);
// exit(); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog Details</title>

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
    <div class="row">
          <div class="col-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header text-center h2 text-lightblue">
                <?= $postTable->h($post->title)  ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img class="img-fluid w-100" src="actions/photos/<?= $post->image ?>" alt="Photo">

                <!-- <p>I took this photo this morning. What do you guys think?</p>
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> -->
                <p><?= $postTable->h($post->content)  ?></p>
                <a href="blog.php" class="btn btn-outline-secondary">Back</a>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <div class="card-title">Comments</div><br>
                <?php foreach($allComments as $comment) : ?>
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="dist/img/user3-128x128.jpg" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      <?php 
                        $author_id = $comment->author_id;
                        $CommenterName = $postTable->getUser($author_id);
                      ?>
                      <?= $postTable->h($CommenterName->name)  ?>
                      <span class="text-muted float-right"><?= $comment->created_at ?></span>
                    </span><!-- /.username -->
                    <?= $postTable->h($comment->content) ?>
                  </div>
                  <!-- /.comment-text -->
                </div>
                <?php endforeach ?>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
              <?php if(isset($commentNull)) : ?>
                  <p class="text-danger">*<?= $commentNull ?> </p>
               <?php endif ?>                 
                <form action="" method="post">
                  <img class="img-fluid img-circle img-sm" src="dist/img/user3-128x128.jpg" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input type="text" class="form-control form-control-sm" name="comment" placeholder="Press enter to post comment">
                    <!-- <a href="actions/comment.php?Aid=<?= $auth->id ?>&&Pid=<?= $post->id ?>" class="btn btn-primary mt-3" type="submit">Submit</a> -->
                    <button class="btn btn-primary mt-2" type="submit">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>    
           