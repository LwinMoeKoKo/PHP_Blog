<?php


include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$auth = Auth::check();

$id = $_GET['id'];

$table = new UsersTable(new MySQL());

$table->deleteUser($id);

HTTP::redirect("/usersTable.php","delete=true");