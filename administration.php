<link rel="stylesheet" href="admin.css">
<?php

session_start();
if(!isset($_SESSION['username'])){
    setcookie('PHPSESSID', null, -1, '/');
    header('location: index.php?erreur=3');
}

if($_SESSION['role'] != 'admin') {
    setcookie('PHPSESSID', null, -1, '/');
    header('location: index.php?erreur=4');
}
?>