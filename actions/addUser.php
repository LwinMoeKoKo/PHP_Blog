<?php
require("../vendor/autoload.php"); 

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$auth = Auth::check();

$table = new UsersTable(new MySQL());

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'] ?? 0;

$table->addUser($name, $email, $password, $role);

HTTP::redirect("/admin.php");
