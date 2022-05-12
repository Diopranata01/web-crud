<?php

/* Sign Up Function */
function emptyInputSignup($username, $password, $nisn){
    $result;
    if(empty($username)|| empty($password)|| empty($nisn)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function uidExists($mysqli, $username, $nisn){
    $q1 = "SELECT * FROM tb_mahasiswa WHERE username = ? OR nisn = ? ;";
    //statement untuk run code terpisah sblm memasukan input user
    $stmt = mysqli_stmt_init($mysqli);
    if(!mysqli_stmt_prepare($stmt, $q1)){
        header("location:../index_sign.php?error=stmtgagal");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $nisn);
    //untuk cek input ke database jika ada
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($mysqli, $username, $password, $nisn){
    $sql = "INSERT INTO tb_mahasiswa (username, password, nisn) VALUES (?, ?, ?)";
    //statement untuk run code terpisah sblm memasukan input user
    $stmt = mysqli_stmt_init($mysqli);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../index_sign.php?error=stmtgagal");
        exit();
    }

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPass, $nisn);
    //untuk cek input ke database jika ada
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:../app/home_app.php");
}

/* Email Function
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}*/



/* Login Funct */
function emptyInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function loginUser($mysqli, $username, $password){
    $uidExists = uidExists($mysqli, $username, $username);
    /* login bisa gunakan username, atau nisn, dimana uidExists memiliki kondisi
    username OR nisn true, $username dapat diisikan nisn atau username*/
    if($uidExists === false){
        header("location:../index_log.php?error=slhuser/nisn");
        exit();
    }
    /*index array dalam db menggunakan nama, seperti "password"*/
    $passHashed = $uidExists["password"];
    
    /*mencocokan dengan db array yang sudah diambil diatas*/
    $checkPass = password_verify($password, $passHashed);

    /*jika tidak cocok db dengan input*/
    if($checkPass === false){
        header("location:../index_log.php?error=salahpass");

    }else if ($checkPass === true){
        session_start();
        /*variabel userid global session, diisikan data username
        dari db setelah login*/
        $_SESSION["userid"]= $uidExists["id"];
        $_SESSION["userUname"]= $uidExists["username"];
        header("location:../app/home_app.php");
        exit();
    }
}