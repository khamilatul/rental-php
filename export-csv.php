<?php
include 'dbconfig.php';

$table = $_GET['table'];

// print_r($table);
$query = $db->query("SELECT * FROM ".$table." ORDER BY id DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = $table."_" . date('Y-m-d h-i-s') . ".csv";
    //create a file pointer
    $f = fopen('php://memory', 'w');

    switch($table) {
        case 'pelanggan';

            //set column headers
            $fields = array('ID', 'nama', 'nip', 'no_ktp', 'nama', 'alamat', 'telp');
            fputcsv($f, $fields, $delimiter);
            
            //output each row of the data, format line as csv and write to file pointer
            while($row = $query->fetch_assoc()){
                $lineData = array($row['id'], $row['nama'], $row['nip'], $row['no_ktp'], $row['nama'],$row['alamat'],$row['telp']);
                fputcsv($f, $lineData, $delimiter);
            }
        break;
        case 'karyawan';
            //set column headers
            $fields = array('ID', 'nama', 'nik', 'nama', 'alamat', 'telp');
            fputcsv($f, $fields, $delimiter);
            
            //output each row of the data, format line as csv and write to file pointer
            while($row = $query->fetch_assoc()){
                $lineData = array($row['id'], $row['nama'], $row['nik'], $row['nama'],$row['alamat'],$row['telp']);
                fputcsv($f, $lineData, $delimiter);
            }
        // code
        break;
        case 'sopir';
        //set column headers
        $fields = array('ID', 'nama', 'nis', 'nama', 'alamat', 'telp', 'no_sim', 'tarif_perjam');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'], $row['nama'], $row['nis'], $row['nama'],$row['alamat'],$row['telp'],$row['no_sim'],$row['tarif_perjam']);
            fputcsv($f, $lineData, $delimiter);
        }
         // code
         break;
         case 'merk';
         //set column headers
         $fields = array('ID', 'nama', 'kode_merk', 'nama');
         fputcsv($f, $fields, $delimiter);
         
         //output each row of the data, format line as csv and write to file pointer
         while($row = $query->fetch_assoc()){
             $lineData = array($row['id'], $row['nama'], $row['kode_merk'], $row['nama']);
             fputcsv($f, $lineData, $delimiter);
         }
          // code
         break;
         case 'jenis_service';
         //set column headers
         $fields = array('ID', 'nama', 'nama');
         fputcsv($f, $fields, $delimiter);
         
         //output each row of the data, format line as csv and write to file pointer
         while($row = $query->fetch_assoc()){
             $lineData = array($row['id'], $row['nama'], $row['nama']);
             fputcsv($f, $lineData, $delimiter);
         }
          // code
          break;
          case 'type';
          //set column headers
          $fields = array('ID', 'nama', 'nama', 'merk_id');
          fputcsv($f, $fields, $delimiter);
          
          //output each row of the data, format line as csv and write to file pointer
          while($row = $query->fetch_assoc()){
              $lineData = array($row['id'], $row['nama'], $row['nama'],  $row['nama'],  $row['merk_id']);
              fputcsv($f, $lineData, $delimiter);
          }
           // code
           break;
           case 'kendaraan';
           //set column headers
           $fields = array('ID', 'no_plat', 'tahun', 'tarif_perjam', 'status_rental', 'type_id');
           fputcsv($f, $fields, $delimiter);
           
           //output each row of the data, format line as csv and write to file pointer
           while($row = $query->fetch_assoc()){
               $lineData = array($row['id'], $row['no_plat'], $row['tahun'],  $row['tarif_perjam'],  $row['status_rental'], $row['type_id']);
               fputcsv($f, $lineData, $delimiter);
           }
            // code
            break;
            case 'pemilik';
            //set column headers
            $fields = array('ID', 'kode', 'nama', 'alamat', 'telp', 'kendaraan_id');
            fputcsv($f, $fields, $delimiter);
            
            //output each row of the data, format line as csv and write to file pointer
            while($row = $query->fetch_assoc()){
                $lineData = array($row['id'], $row['kode'], $row['nama'],  $row['alamat'],  $row['telp'], $row['kendaraan_id']);
                fputcsv($f, $lineData, $delimiter);
            }
             // code
             break;
             case 'service';
             //set column headers
             $fields = array('ID', 'kode_service', 'tgl', 'biaya', 'kendaraan_id', 'jenis_service_id');
             fputcsv($f, $fields, $delimiter);
             
             //output each row of the data, format line as csv and write to file pointer
             while($row = $query->fetch_assoc()){
                 $lineData = array($row['id'], $row['kode_service'], $row['tgl'],  $row['biaya'],  $row['kendaraan_id'], $row['jenis_service_id']);
                 fputcsv($f, $lineData, $delimiter);
             }
              // code
              break;
              case 'setoran';
              //set column headers
              $fields = array('ID', 'no', 'tgl', 'jumlah', 'pemilik_id', 'karyawan_id');
              fputcsv($f, $fields, $delimiter);
              
              //output each row of the data, format line as csv and write to file pointer
              while($row = $query->fetch_assoc()){
                  $lineData = array($row['id'], $row['no'], $row['tgl'],  $row['jumlah'],  $row['pemilik_id'], $row['karyawan_id']);
                  fputcsv($f, $lineData, $delimiter);
              }
               // code
               break;
               case 'transaksi_sewa';
               //set column headers
               $fields = array('ID', 'no', 'tglpesan', 'jumlah', 'tglpinjam', 'jampinjam','tgl_kembali_rencana','jam_kembali_rencana',
                                'tgl_kembali_realisasi', 'jam_kembali_realisasi');
               fputcsv($f, $fields, $delimiter);
               
               //output each row of the data, format line as csv and write to file pointer
               while($row = $query->fetch_assoc()){
                   $lineData = array($row['id'], $row['no'], $row['tglpesan'],  $row['jumlah'],  $row['pemilik_id'], $row['karyawan_id']);
                   fputcsv($f, $lineData, $delimiter);
               }
                // code
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>