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