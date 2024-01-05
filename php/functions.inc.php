<?php
function pwdMatch($password, $pwdr){

    $result = false;
    if($password !== $pwdr) {
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function uidexists($conn, $name){
    $sql = "SELECT * FROM advisors WHERE name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)){
        mysqli_stmt_close($stmt);
        return $row;
    }
    else{
        mysqli_stmt_close($stmt);
        return false;
    }
}

function createadvisor($conn,$name,$password){

    $sql = "INSERT INTO advisors(name, password) VALUES(?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();

}

function loginadvisor($conn,$name,$password){

    $uidexists = uidexists($conn,$name);

    if($uidexists === false ){
        header("location:  ../index.php?error=wrongcredentials");
        exit();
    }

    $pwdHashed = $uidexists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd === false ){
        header("location:  ../index.php?error=wrongcredentials");
        exit();
    }

    elseif($checkPwd === true ){

    session_start();
    $_SESSION["id"]=$uidexists["id"];
    $_SESSION["name"]=$uidexists["name"];
    header("location: ../index.php");

    exit();

}

}