<?php

$host="127.0.0.1";
$port=8889;
$user="root";
$password="root";
$dbname="fire_db";

// Recebendo dados do formulário
$email = $_POST['inputEmail'] ?? '';
$passwd = md5($_POST['inputPassword']) ?? '';

$con =  new mysqli($host, $user, $password, $dbname, $port) or
die ('Could not connect to the database server' . mysqli_connect_error());


$query = "SELECT * FROM fire_db.user WHERE email = '$email'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);


$e = $row['email'];
$p = $row['password'];

if ($email == $e && $passwd == $p){
    if(!isset($_SESSION)) session_start();
    $_SESSION['logged'] = true;

   header('Location:index.php');
} else{
    if(!isset($_SESSION)) session_start();
    $_SESSION['logged'] = false;
    // guarda a senha e login na session
    header('Location:index.php');
}