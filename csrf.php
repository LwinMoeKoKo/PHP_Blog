<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\PostsTable;

$table = new PostsTable(new MySQL());

$table->tokenCsrf();

print "<pre>";
print_r($_SESSION);
exit();    

