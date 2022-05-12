<?php

include '../auth/connect_log.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UFT-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Mahasiswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .mx-auto { width:800px}
            .card { margin-top:10px}
            .table { margin-left: auto }
        </style>
</head>

<body>
  <div class="mx-auto">
      <div class="card">
          <div class="card-header text-white bg-secondary">
           Data Siswa
          </div>
          <div class="card-body">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Nisn</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Username</th>
                          <th scope="col">Aksi</th>
                      </tr>
  
                      <!-- Php menampilkan data-->
                      
                      <tbody>
                              <?php
                              $sql2   ="select *from tb_mahasiswa order by nisn asc"; 
                              //alternatif lain (select *from tb_mahasiswa order by id default);
                          
                              //utama
                              $q2     =mysqli_query($mysqli,$sql2);
  
                              //array urut
                              $urut   =1;

                              //perulangan untuk tampilkan nim
                              while($r2= mysqli_fetch_array($q2)){
                                  $id         =$r2['id'];
                                  $nisn       =$r2['nisn'];
                                  $nama       =$r2['nama'];
                                  $kelas      =$r2['kelas'];
                                  $username   =$r2['username'];

  
                                  ?>
                                  <tr>
                                      <th scope="row"><?php echo $urut++ ?></th>
                                      <td scope="row"><?php echo $nisn ?></td>
                                      <td scope="row"><?php echo $nama ?></td>
                                      <td scope="row"><?php echo $kelas ?></td>
                                      <td scope="row"><?php echo $username ?></td>
                                      <td scope="row">
                                          <a href="index.php?op=edit&id=<?php echo $id?>">
                                              <button type="button" class="btn btn-danger">Edit</button>
                                          </a><a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm ('Apakah Anda Yakin?')">
                                              <button type="button" class="btn btn-warning">Delete</button>
                                          </a>
                                      </td>
                                  </tr>
                                  <?php
                              }
                              ?>
                          </tbody>
  
                  </thead>
  
              </table>
          </div>
          
      </div>
  </div>
</body>
</html>