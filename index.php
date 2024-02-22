<?php
include_once __DIR__."/Model/User.php";
session_start();

if(isset($_SESSION['pweb_token'])== false){
    #token tidak ada
    header("Location: login.php");
    exit;
}
$token = $_SESSION['pweb_token'];
$user = User::getByToken($token);
if($user == null){
  #token tidak valid
  header("Location: login.php");
  exit;
}
function harusSuperadmin(){
  global $user;
  if($user->role != 'superadmin'){
    header("Location: /View/error/403.html");
    exit;
  }
 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Hi, <?=$user->username ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Produk
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/index.php">list Produk</a>
          <a class="dropdown-item" href="/index.php?page=addProduk">Tambah Produk</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/index.php?page=listkategori">list Kategori</a>
          <a class="dropdown-item" href="/index.php?page=addkategori">Tambah Kategori</a>
        </div>
        <li class="nav-item">
        <a class="nav-link" href="/logout.php">Logout</a>
      </li>
    
    </ul>
    
  </div>
</nav>
    <?php
    $page = "produk/list.php";
    if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        switch($page){
            case 'addProduk': 
              $page = "produk/formtambah.php";
              break;
            case 'editeProduk':
              harusSuperadmin();
              $page = "produk/formUbah.php";
              break;
            case 'deleteProduk': 
              harusSuperadmin();
              $page = "produk/KonfirmasiHapus.php";
              break;

            case 'listkategori': 
              $page = "kategori/list.php";
              break;
            case 'addkategori': 
              $page = "kategori/formTambah.php";
              break;
            case 'editekategori': 
              harusSuperadmin();
              $page = "kategori/formUbah.php";
              break;
            
            

        }
     
        } 
        include_once __DIR__."/View/".$page;
            
    ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>
