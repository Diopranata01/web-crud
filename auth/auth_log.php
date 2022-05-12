<?php

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'connect_log.php';
    require_once 'function.php';

    if(emptyInputLogin($username, $password)!== false){
        header("location:../index_log.php?error=emptyinput");
        exit();
    }
    loginUser($mysqli, $username, $password);

}else {
    /*jika submit tidak berjalan*/
    header("location:../index_log.php?error-silahkanulang");
    exit();
}

/*include 'connect_log.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($mysqli, "SELECT *from tb_mahasiswa where username ='$username' and password= '$password'");
$result = mysqli_num_rows($query);

if($result > 0){
    header("location:../app/home_app.php");

}else{
    header("location:../index_log.php?pesan=error");  
}*/

?>