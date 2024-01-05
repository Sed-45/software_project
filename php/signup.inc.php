<?php

if(isset($_POST["submit"])){
    echo "It works";
    $name = $_POST["name"];
    $password = $_POST["password"];
    $pwdr = $_POST["pwdr"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (pwdMatch($password,$pwdr) !== false){
        header("location:  ../index.php?error=passwordsdontmatch");
        exit();
    }

    if (uidexists($conn,$name) !== false){
        header("location:  ../index.php?error=usernametaken");
        exit();

    }
    createadvisor($conn,$name,$password);
}

else{
    header("location: ../index.php");
}