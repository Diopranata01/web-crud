
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="Image/png" sizes="16x16" href="images/pend1.jpg">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Sis-Campus</title>
  </head>
  <body>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid" style="margin-top: 50px;">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <img src="images/pend2.png" alt="" width="200px" style="margin-left : 75px; margin-bottom: 40px;">
              <h3><a href="index_log.php">Log In</a> | Sign Up</h3>
              
              <p class="mb-4">Sudah memiliki akun? silahkan masukan (Log In)!</p>
            </div>
            
            <!--Koneksi ke auth-->
            <form action="auth/auth_signup.php" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">

              </div>
              <div class="form-group second">
                <label for="username">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>
              
              <!-- Note
              Syntax ini akan berjalan jika req Api menggunakan $_GET,
              menghasilkan error samadengan kondisi if, serta kondisi
              error tidak boleh terlalu panjang
              -->
              <?php
              if (isset($_GET["error"])){
                if ($_GET["error"]=="emptyinput"){
                  ?>
                  <div class="alert alert-danger" role="alert" style="text-align:center">
                  <?php echo "Ada field yang belum terisi!";?>
                  </div>
              <?php
                }
                else if($_GET["error"]=="invalid"){
              ?>
                  <div class="alert alert-danger" role="alert" style="text-align:center">
                  <?php echo "Username telah terdaftar";?>
                  </div>
              <?php
                }
                else if($_GET["error"]=="unamepassex"){
              ?>
                  <div class="alert alert-danger" role="alert" style="text-align:center">
                  <?php echo "Username telah terdaftar";?>
                  </div>
              <?php
                }
                header ("refresh:5;url=index_sign.php");
              }
              ?>

              <!-- Input Button-->
              <input type="submit" value="Sign In" name= "submit" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>

            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>