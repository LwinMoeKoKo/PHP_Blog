<?php


include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\PostsTable;

$table = new UsersTable(new MySQL());
$table1 = new PostsTable(new MySQL());

$auth = Auth::check();

$id = $_GET['id'];

if($_GET['csrf'] === $_SESSION['csrf']){
    $table->deletePost($id);
    
    HTTP::redirect("/admin.php","delete=true");   
} else {
    unset($_SESSION['user']);
    HTTP::redirect("/index.php");
}