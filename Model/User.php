<?php
include_once __DIR__."/../Config/koneksi.php";

class User{
    public $id;
    public $username;
    public $password;
    public $token;
    public $role;

    public static function getByUsername($username){
        $conn = new Koneksi();
        $sql = "SELECT * FROM user WHERE username='$username'";
        $mq = mysqli_query($conn->koneksi,$sql);
        $user= null;
        while ($row = mysqli_fetch_assoc($mq)){
            $user = new User();
            $user->id =$row['id'];
            $user->username = $row['username'];
            $user->password = $row['password'];
            $user->token = $row['token'];
            $user->role = $row['role'];
            
        
        }
        return $user;
    }
    public static function getByToken($token){
        $conn = new Koneksi();
        $sql = "SELECT * FROM user WHERE token='$token'";
        $mq = mysqli_query($conn->koneksi,$sql);
        $user= null;
        while ($row = mysqli_fetch_assoc($mq)){
            $user = new User();
            $user->id =$row['id'];
            $user->username = $row['username'];
            $user->password = $row['password'];
            $user->token = $row['token'];
            $user->role = $row['role'];
            
        }
        return $user;
    }  
    
    public function updateToken(){
        $conn = new Koneksi();
        $sql = "update user set token ='$this->token' where id='$this->id'";
        mysqli_query($conn->koneksi,$sql);
    }
}