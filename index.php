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
              case '?module=pelanggan-edit':
              case '?module=pelanggan-show':
                  $('#pelanggan').addClass('is-active');
                  break; 
              case '?module=karyawan':
              case '?module=karyawan-create':
              case '?module=karyawan-edit':
              case '?module=karyawan-show':
                  $('#karyawan').addClass('is-active');
                  break; 
              case '?module=sopir':
              case '?module=sopir-create':
              case '?module=sopir-edit':
              case '?module=sopir-show':
                  $('#sopir').addClass('is-active');
                  break; 
              case '?module=merk':
              case '?module=merk-create':
              case '?module=merk-edit':
              case '?module=merk-show':
                  $('#merk').addClass('is-active');
                  break; 
              case '?module=jenis-service':
              case '?module=jenis-service-create':
              case '?module=jenis-service-edit':
              case '?module=jenis-service-show':
                  $('#jenis-service').addClass('is-active');
                  break; 
              case '?module=kendaraan':
              case '?module=kendaraan-create':
              case '?module=kendaraan-edit':
              case '?module=kendaraan-show':
                  $('#kendaraan').addClass('is-active');
                  break; 
              case '?module=pemilik':
              case '?module=pemilik-create':
              case '?module=pemilik-edit':
              case '?module=pemilik-show':
                  $('#pemilik').addClass('is-active');
                  break; 
              case '?module=service':
              case '?module=service-create':
              case '?module=service-edit':
              case '?module=service-show':
                  $('#service').addClass('is-active');
                  break; 
              case '?module=setoran':
              case '?module=setoran-create':
              case '?module=setoran-edit':
              case '?module=setoran-show':
                  $('#setoran').addClass('is-active');
                  break; 
              case '?module=type':
              case '?module=type-create':
              case '?module=type-edit':
              case '?module=type-show':
                  $('#type').addClass('is-active');
                  break; 
              case '?module=transaksi-sewa':
              case '?module=transaksi-sewa-create':
              case '?module=transaksi-sewa-edit':
              case '?module=transaksi-sewa-show':
                  $('#transaksi-sewa').addClass('is-active');
                  break; 
              default: 
                  text = "Looking forward to the Weekend";
          }
      });
    </script>
  </body>
</html>



