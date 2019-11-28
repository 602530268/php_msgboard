<?php

require './db.php';

header('content-type:text/html;charset=utf-8');

$id = $_POST['id'];
$password = $_POST['password'];

// $response = new Response;
// echo $response -> json($nickname,$content,$contacts);

$data = deleteDB($id,$password);
echo $data;

?>