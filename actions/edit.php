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
        $table->EditPostNoImg($title,$content,$auth->id);
        HTTP::redirect("/admin.php","editSuccess=true");
    } else {
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgType = $_FILES['image']['type'];
        if($imgError){
            HTTP::redirect("/edit.php","error=file");
        }
        if($imgType === "image/jpeg" ||
            $imgType === "image/jpg" ||
            $imgType === "image/png" ){
                move_uploaded_file($imgTmp, "photos/$imgName");
                $table->EditPost($title,$content,$imgName,$auth->id);
                HTTP::redirect("/admin.php","editSuccess=true");
            } else {
                HTTP::redirect("/edit.php","error=type");
            }
    }
}






