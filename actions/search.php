<?php

include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$title = $_POST['title'];

$table = new UsersTable(new MySQL());
$row = $table->searchPost($title);
// print "<pre>";
// print_r($row);
// exit();    


HTTP::redirect("/admin.php","search=$row");