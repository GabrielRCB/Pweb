<?php
include_once __DIR__."/Model/User.php";

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$user = User::getByUsername($username);

if ($user != null) {
    if(password_verify($password, $user->password)) {
        $teksToken = $username.date('YmdHis');
        $token = md5 ($teksToken);
        $user->token = $token;
        $user->updateToken();
        session_start();
        $_SESSION["pweb_token"] = $token;
        header('Location: index.php');
        exit;
    }
}
header("Location: login.php");