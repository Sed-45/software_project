<?php

if(isset($_POST["submit"])){
    echo "It works";
    $username = $_POST["name"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (loginadvisor($conn,$name,$password) !== false){
        header("location:  ../index.php?error=wrongcredentials");
        exit();
    }

}

else{
    header("location: ../index.php");
}