<?php

require './db.php';

header('content-type:text/html;charset=utf-8');

$nickname = $_POST['nickname'];
$content = $_POST['content'];
$password = $_POST['password'];

echo insertDB($nickname,$content,$password);

// $response = new Response;
// echo $response -> json($nickname,$content,$contacts);

// class Response {
//     public function json($code,$message,$data) {
//         $result = array(
//             "code"=>$code,
//             "message"=>$message,
//             "data"=>$data
//         );
//         return json_encode($result);
//     }
// }



?>