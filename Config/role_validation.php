<?php
include_once __DIR__.'/../Model/User.php';

session_start();
#validasi token
$token = $_SESSION['pweb_token'];
$user = User::getByToken($token);
if($user == null){
  #token tidak valid
  header("Location: login.php");
  exit;
}

  if($user->role != 'superadmin'){
    header("Location: /View/error/403.html");
    exit;
  }