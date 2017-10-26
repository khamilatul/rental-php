<?php
// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: /rental/login.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rental | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css">
  </head>
  <body>
    
    <!-- Start Top Bar -->
    <?php include 'includes/navbar.php'; ?>
    <!-- End Top Bar -->

    <?php include 'includes/jumbotron.php'; ?>
    
    <div class="grid-container fluid">
      <div class="grid-x grid-margin-x" id="content">
        <div class="medium-8 cell card">
          <?php include 'content.php'; ?>
        </div>
        <div class="medium-4 cell card">
          <?php include 'includes/sidebar.php'; ?>
        </div>
      </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
      $(document).foundation();
      
      $(document).ready(function(){
          var pathname = window.location.search;
          console.log('url path =>',pathname);
          switch (pathname) {
              case '?module=pelanggan':
              case '?module=pelanggan-create':
                  $('#pelanggan').addClass('is-active');
                  break; 
              case '?module=karyawan':
              case '?module=karyawan-create':
                  $('#pelanggan').removeClass('is-active');
                  $('#karyawan').addClass('active');
                  break; 
              default: 
                  text = "Looking forward to the Weekend";
          }
      });
    </script>
  </body>
</html>



