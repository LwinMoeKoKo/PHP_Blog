<?php


include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$role = $_GET['role'];
$id = $_GET['id'];

$auth = Auth::check();

$table = new UsersTable(new MySQL());

$table->changeRoleUser($id, $role);

HTTP::redirect("/usersTable.php","change=true");