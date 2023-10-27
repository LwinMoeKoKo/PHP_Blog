<?php


include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);

$table = new UsersTable(new MySQL());

$checkEmail = $table->checkEmail($email);

if($checkEmail){
    HTTP::redirect("/register.php","havingEmail=true");
} else {
    $table->registerUser($name, $email, $password);
    
    HTTP::redirect("/index.php","success=true");
}