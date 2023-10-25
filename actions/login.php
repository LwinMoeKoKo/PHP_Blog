<?php

include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$email = $_POST['email'];
$password = $_POST['password'];

$table = new UsersTable(new MySQL());

$user = $table->searchByEmail($email);

// print "<pre>";
// print_r($user);
// exit();    

if($user && $password === $user->password){
        session_start();
        $_SESSION['user'] = $user;
        if($user->role === 1){
           HTTP::redirect('/admin.php'); 
        } else {
            HTTP::redirect('/blog.php'); 
        }
    } else {
        HTTP::redirect('/index.php?incorrect=1');
    };
        

