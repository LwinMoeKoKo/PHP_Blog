<?php


include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

// print "<pre>";
// print_r($_POST);
// print_r($_FILES);
// exit(); 
$table = new UsersTable(new MySQL());

$auth = Auth::check();
$imgName = $_FILES['image']['name'];
$imgError = $_FILES['image']['error'];

if($_POST){
    $title = $_POST['title'];
    $content = $_POST['content'];  

    if($imgError === 4){
        $table->createPostNoImg($title,$content,$auth->id);
        HTTP::redirect("/create.php","createSuccess=true");
    } else {
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgType = $_FILES['image']['type'];
        if($imgError){
            HTTP::redirect("/create.php","error=file");
        }
        if($imgType === "image/jpeg" ||
            $imgType === "image/jpg" ||
            $imgType === "image/png" ){
                move_uploaded_file($imgTmp, "photos/$imgName");
                $table->createPost($title,$content,$imgName,$auth->id);
                HTTP::redirect("/admin.php","createSuccess=true");
            } else {
                HTTP::redirect("/create.php","error=type");
            }
    }
}






