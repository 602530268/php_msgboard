<?php

function initDB()
{
    // 创建数据库
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "php_msgboard";

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die('连接mysql失败: ' . $conn->connect_error);
    }

    // 创建数据库
    $sql = "create database if not exists php_msgboard character set UTF8";
    if ($conn->query($sql) === TRUE) {
        // echo "数据库创建成功<br>";
    } else {
        echo "数据库创建失败: " . $conn->error . "<br>";
    }

    // 建表
    $sql = "create table if not exists msgboard(
    id int unsigned primary key auto_increment,
    nickname varchar(50) not null,
    content varchar(255) not null,
    time timestamp null default CURRENT_TIMESTAMP,
    password varchar(8) not null
    );";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->query($sql) === TRUE) {
        // echo "创建表成功<br>";
    } else {
        echo "创建表失败: " . $conn->error . "<br>";
    }

    $conn->close();
}

function getTable() {
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "php_msgboard";

    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
        die('连接mysql失败: ' . $conn->connect_error);
    }
    return $conn;
}

function insertDB($nickname,$content,$password) {
    // echo '插入数据...<br>';
    $conn = getTable();
    $sql = sprintf("insert into msgboard(nickname,content,password)
     values('%s','%s','%s')",$nickname,$content,$password);
    if ($conn->query($sql) != TRUE) {
        echo '插入失败: ' . $conn->error . "<br>";
    }
    $conn->close();
    return 'success';
}

function selectDB() {
    // echo "获取数据...<br>";
    $conn = getTable();
    $sql = sprintf("select * from msgboard order by id desc");
    if (!$res = mysqli_query($conn,$sql)) {
        echo '获取数据失败' . "<br>";
    }

    $data = mysqli_fetch_all($res,MYSQLI_ASSOC);
    mysqli_free_result($res);
    $conn->close();

    return $data;
}   

function deleteDB($id,$password) {
    $conn = getTable();
    $sql = sprintf("delete from msgboard where id='%s' and password='%s'",$id,$password);
    if ($conn->query($sql) != TRUE) {
        echo '删除失败: ' . $conn->error . "<br>";
        return '删除失败';
    }
    $conn->close();
    return 'success';    
}


function updateDB($id,$content,$password) {
    $conn = getTable();
    $sql = sprintf("update msgboard set content='%s' where id='%s' and password='%s'",$content,$id,$password);
    if ($conn->query($sql) != TRUE) {
        echo '更新失败: ' . $conn->error . "<br>";
        return '更新失败';
    }
    $conn->close();
    return 'success';    
}

?>