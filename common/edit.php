<?php

require './db.php';

header('content-type:text/html;charset=utf-8');

$id = $_POST['id'];
$content = $_POST['content'];
$password = $_POST['password'];

echo updateDB($id,$content,$password);

?>