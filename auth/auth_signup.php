<?php

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nisn     = $_POST['nisn'];

    require_once 'connect_log.php';
    require_once 'function.php';

    if(emptyInputSignup($username, $password, $nisn)!== false){
        header("location:../index_sign.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username)!== false){
        header("location:../index_sign.php?error=invalid");
        exit();
    }
    if(uidExists($mysqli,$username,$nisn)!== false){
        header("location:../index_sign.php?error=unamepassex");
        exit();
    }
    
    createUser($mysqli, $username, $password, $nisn);

}else {
    header("location:../index_sign.php?error-silahkanulang");
    exit();
}