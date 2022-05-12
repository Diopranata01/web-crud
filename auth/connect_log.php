<?php

$host   ='localhost';
$user   ='root';
$pass   ='';
$dbname ='db_kampus';

$mysqli = mysqli_connect($host,$user,$pass,$dbname);

if(!$mysqli){
    die("koneksi gagal" . mysqli_connect_error());
}
?>