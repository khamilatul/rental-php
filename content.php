<?php

// cek apakah module sudah ada apa belum diparameter
$module = empty($_GET['module']) ? 'home' : $_GET['module'];

switch($module) {
    // Module Home
    case 'home':
    include 'home.php';
    break;

    // Module Laporan
    case 'laporan':
    include 'laporan.php';
    break;

    // Module Pelanggan
    case 'pelanggan':
        include 'modules/pelanggan/pelanggan-index.php';
    break;
    case 'pelanggan-create':
        include 'modules/pelanggan/pelanggan-create.php';
    break;
    case 'pelanggan-edit':
        include 'modules/pelanggan/pelanggan-edit.php';
    break;
    case 'pelanggan-delete':
        include 'modules/pelanggan/pelanggan-delete.php';
    break;
    case 'pelanggan-show':
        include 'modules/pelanggan/pelanggan-show.php';
    break;


    // Module Karyawan
    case 'karyawan':
    include 'modules/karyawan/karyawan-index.php';
    break;
    case 'karyawan-create':
        include 'modules/karyawan/karyawan-create.php';
    break;
    case 'karyawan-edit':
        include 'modules/karyawan/karyawan-edit.php';
    break;
    case 'karyawan-delete':
        include 'modules/karyawan/karyawan-delete.php';
    break;
    case 'karyawan-show':
        include 'modules/karyawan/karyawan-show.php';
    break;  

    // Module Kendaraan
    case 'kendaraan':
    include 'modules/kendaraan/kendaraan-index.php';
    break;
    case 'kendaraan-create':
        include 'modules/kendaraan/kendaraan-create.php';
    break;
    case 'kendaraan-edit':
        include 'modules/kendaraan/kendaraan-edit.php';
    break;
    case 'kendaraan-delete':
        include 'modules/kendaraan/kendaraan-delete.php';
    break;
    case 'kendaraan-show':
        include 'modules/kendaraan/kendaraan-show.php';
    break;

    // Module Service
    case 'service':
    include 'modules/service/service-index.php';
    break;
    case 'service-create':
        include 'modules/service/service-create.php';
    break;
    case 'service-edit':
        include 'modules/service/service-edit.php';
    break;
    case 'service-delete':
        include 'modules/service/service-delete.php';
    break;
    case 'service-show':
        include 'modules/service/service-show.php';
    break;
    
    // Module Jenis Service
    case 'jenis-service':
    include 'modules/jenis-service/jenis-service-index.php';
    break;
    case 'jenis-service-create':
        include 'modules/jenis-service/jenis-service-create.php';
    break;
    case 'jenis-service-edit':
        include 'modules/jenis-service/jenis-service-edit.php';
    break;
    case 'jenis-service-delete':
        include 'modules/jenis-service/jenis-service-delete.php';
    break;
    case 'jenis-service-show':
        include 'modules/jenis-service/jenis-service-show.php';
    break;  

    // Module Type
    case 'type':
    include 'modules/type/type-index.php';
    break;
    case 'type-create':
        include 'modules/type/type-create.php';
    break;
    case 'type-edit':
        include 'modules/type/type-edit.php';
    break;
    case 'type-delete':
        include 'modules/type/type-delete.php';
    break;
    case 'type-show':
        include 'modules/type/type-show.php';
    break;  

    // Module Merk
    case 'merk':
    include 'modules/merk/merk-index.php';
    break;
    case 'merk-create':
        include 'modules/merk/merk-create.php';
    break;
    case 'merk-edit':
        include 'modules/merk/merk-edit.php';
    break;
    case 'merk-delete':
        include 'modules/merk/merk-delete.php';
    break;
    case 'merk-show':
        include 'modules/merk/merk-show.php';
    break;  

    
    // Module Setoran
    case 'setoran':
    include 'modules/setoran/setoran-index.php';
    break;
    case 'setoran-create':
        include 'modules/setoran/setoran-create.php';
    break;
    case 'setoran-edit':
        include 'modules/setoran/setoran-edit.php';
    break;
    case 'setoran-delete':
        include 'modules/setoran/setoran-delete.php';
    break;
    case 'setoran-show':
        include 'modules/setoran/setoran-show.php';
    break;  
  

    // Module Pemilik
    case 'pemilik':
    include 'modules/pemilik/pemilik-index.php';
    break;
    case 'pemilik-create':
        include 'modules/pemilik/pemilik-create.php';
    break;
    case 'pemilik-edit':
        include 'modules/pemilik/pemilik-edit.php';
    break;
    case 'pemilik-delete':
        include 'modules/pemilik/pemilik-delete.php';
    break;
    case 'pemilik-show':
        include 'modules/pemilik/pemilik-show.php';
    break;  
  

     // Module Sopir
     case 'sopir':
     include 'modules/sopir/sopir-index.php';
     break;
     case 'sopir-create':
         include 'modules/sopir/sopir-create.php';
     break;
     case 'sopir-edit':
         include 'modules/sopir/sopir-edit.php';
     break;
     case 'sopir-delete':
         include 'modules/sopir/sopir-delete.php';
     break;
     case 'sopir-show':
         include 'modules/sopir/sopir-show.php';
     break;  

     // Module Transaksi Sewa
     case 'transaksi-sewa':
     include 'modules/transaksi-sewa/transaksi-sewa-index.php';
     break;
     case 'transaksi-sewa-create':
         include 'modules/transaksi-sewa/transaksi-sewa-create.php';
     break;
     case 'transaksi-sewa-edit':
         include 'modules/transaksi-sewa/transaksi-sewa-edit.php';
     break;
     case 'transaksi-sewa-delete':
         include 'modules/transaksi-sewa/transaksi-sewa-delete.php';
     break;
     case 'transaksi-sewa-show':
         include 'modules/transaksi-sewa/transaksi-sewa-show.php';
     break;  
      
      // Module Rental Pelanggan
      case 'rental-pelanggan':
      include 'modules/rental-pelanggan/rental-pelanggan-index.php';
      break;
      case 'rental-pelanggan-create':
          include 'modules/rental-pelanggan/rental-pelanggan-create.php';
      break;
      case 'rental-pelanggan-edit':
          include 'modules/rental-pelanggan/rental-pelanggan-edit.php';
      break;
      case 'rental-pelanggan-delete':
          include 'modules/rental-pelanggan/rental-pelanggan-delete.php';
      break;
      case 'rental-pelanggan-show':
          include 'modules/rental-pelanggan/rental-pelanggan-show.php';
      break;
      case 'rental-pelanggan-kembali':
      include 'modules/rental-pelanggan/rental-pelanggan-kembali.php';
  break;

    // Jika module tidak ditemukan maka di redirect ke home 
    default: include'home.php';  
}
?>