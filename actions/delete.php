<?php


include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());

$auth = Auth::check();

$id = $_GET['id'];

$table->deletePost($id);

HTTP::redirect("/admin.php");