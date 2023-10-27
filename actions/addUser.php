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
$password = password_hash($_POST['password'],PASSWORD_BCRYPT) ;
$role = 0;

$checkEmail = $table->checkEmail($email);
if($checkEmail){
    HTTP::redirect("/addUser.php","havingEmail=true");
}
if( $_POST['role'] === "on"){
    global $role;
    $role = 1;
} else {
    $role = 0;
}

$data = [
    "name" => $name,
    "email" => $email,
    "password" => $password,
    'role' => $role,
];

$user = $table->addUser($data);
// print "<pre>";
// print_r($role);
// print_r($data);
// exit();    

HTTP::redirect("/usersTable.php","add=true");
