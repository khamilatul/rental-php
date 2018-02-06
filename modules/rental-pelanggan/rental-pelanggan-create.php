<?php
require_once("database.php");
?>
<?php ob_start();?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=rental-pelanggan">Rental Pelanggan</a></li>
  <li class="disabled">Create Data Rental Pelanggan</li>
</ul></nav>
<form action="" method="post">

<!-- field no -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="no" class="text-right middle">Nomor Transaksi Sewa</label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('transaksisewa','id');
  $res = $db->getResult();
  $no = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'TRX00'.$no;
  echo "<input type='text' name='no' value='$value' placeholder='Nomor Transaksi Sewa' readonly>";
?>
</div>
</div>

<!-- field tglpesan -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tglpesan" class="text-right middle">Tanggal Pesan</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tglpesan" placeholder="Tanggal Pesan" required>
  </div>
</div>

<!-- field tglpinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tglpinjam" class="text-right middle">Tanggal Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tglpinjam" placeholder="Tanggal Pinjam" required>
  </div>
</div>

<!-- field jampinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jampinjam" class="text-right middle">Jam Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="time" name="jampinjam" placeholder="Jam Pinjam" required>
  </div>
</div>


<!-- field tgl_kembali_rencana -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl_kembali_rencana" class="text-right middle">Tanggal Kembali Rencana</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl_kembali_rencana" placeholder="Tanggal Kembali Rencana" required>
  </div>
</div>

<!-- field jam_kembali_rencana -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jam_kembali_rencana" class="text-right middle">Jam Kembali Rencana</label>
  </div>
  <div class="small-6 cell">
    <input type="time" name="jam_kembali_rencana" placeholder="Jam Kembali Rencana" required>
  </div>
</div>

<!-- field kilometer_pinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kilometer_pinjam" class="text-right middle">Kilometer Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kilometer_pinjam" placeholder="Kilometer Pinjam" required>
  </div>
</div>

<!-- field BBM_pinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="BBM_pinjam" class="text-right middle">BBM Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="BBM_pinjam" placeholder="BBM Pinjam" required>
  </div>
</div>

<!-- field kondisi_mobil_pinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kondisi_mobil_pinjam" class="text-right middle">Kondisi Mobil Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kondisi_mobil_pinjam" placeholder="Kondisi Mobil Pinjam" required>
  </div>
</div>

<!-- field sopir_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="sopir_id" class="text-right middle">Nama Sopir</label>
  </div>
  <div class="small-6 cell">
  <select name="sopir_id">
  <?php
    $db = new Database();
    $db->select('sopir','id, nama');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[nama]</option>";
    }    
  ?>
  </select>
  </div>
  </div>
  
<!-- field kendaraan_id -->
<div class="grid-x grid-padding-x">
  <div class="small-6 cell">
  <input type="hidden" name="kendaraan_id" value="<?php echo $_GET['kendaraan_id']?>" placeholder="Biaya BBM" readonly>
  </div>
  </div>

<!-- field pelanggan_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="pelanggan_id" class="text-right middle">Nama Pelanggan </label>
  </div>
  <div class="small-6 cell">
  <select name="pelanggan_id">
  <?php
    $db = new Database();
    $db->select('pelanggan','id, nama');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[nama]</option>";
    }    
  ?>
  </select>
  </div>
  </div>

<!-- field karyawan_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="karyawan_id" class="text-right middle">Nama Karyawan</label>
  </div>
  <div class="small-6 cell">
  <select name="karyawan_id">
  <?php
    $db = new Database();
    $db->select('karyawan','id, nama');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[nama]</option>";
    }    
  ?>
  </select>
  </div>
  </div>

<!-- Aksi -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="no" class="text-right middle"></label>
  </div>
  <div class="small-6 cell">
      <div class="small button-group">
    <button class="button" type="submit" name="submit">Simpan</button>
    <button class="button" type="reset">Reset</button>
    <a class="button" href='javascript:self.history.back();'>Kembali</a>
  </div>
  </div>
</div>
</form>

<?php 

// check action submit
if(isset($_POST['submit'])){
$no = $_POST['no'];
$tglpesan = $_POST['tglpesan'];
$tglpinjam = $_POST['tglpinjam'];
$jampinjam = $_POST['jampinjam'];
$tgl_kembali_rencana = $_POST['tgl_kembali_rencana'];
$jam_kembali_rencana = $_POST['jam_kembali_rencana'];
$kilometer_pinjam = $_POST['kilometer_pinjam'];
$BBM_pinjam = $_POST['BBM_pinjam'];
$kondisi_mobil_pinjam = $_POST['kondisi_mobil_pinjam'];
// $biaya_BBM = $_POST['biaya_BBM'];
$sopir_id = $_POST['sopir_id'];
$kendaraan_id	 = $_POST['kendaraan_id'];
$pelanggan_id = $_POST['pelanggan_id'];
$karyawan_id = $_POST['karyawan_id'];

  // select transaksisewa where pelanggan_id=$pelanggan_id
  // jika tgl kembali ada maka boleh dipinjam lagi
  // jika idak maka muncul notifikasi bahwa dia belum mengembalikan
  $cek=new Database();
  $cek->select('transaksisewa', 'kembali','','','','',"pelanggan_id=$pelanggan_id AND kembali=0");

  $result = $cek->getOne();

  if($result) {
    echo "<script>alert('Kembalikan mobilnya dulu dong gaess')</script>";
  } else {
    $db=new Database();
    $db->insert('transaksisewa',array(
      'no' => $_POST['no'],
      'tglpesan' => $_POST['tglpesan'],
      'tglpinjam' => $_POST['tglpinjam'],
      'jampinjam' => $_POST['jampinjam'],
      'tgl_kembali_rencana' => $_POST['tgl_kembali_rencana'],
      'jam_kembali_rencana' => $_POST['jam_kembali_rencana'],
      'kilometer_pinjam' => $_POST['kilometer_pinjam'],
      'BBM_pinjam' => $_POST['BBM_pinjam'],
      'kondisi_mobil_pinjam' => $_POST['kondisi_mobil_pinjam'],
      'sopir_id' => $_POST['sopir_id'],
      'kendaraan_id' =>$_POST['kendaraan_id'],
      'pelanggan_id' => $_POST['pelanggan_id'],
      'karyawan_id' => $_POST['karyawan_id'],
    ));
    $res=$db->getResult();
    // print_r($res);
    $kendaraan_id = $_GET['kendaraan_id'];
    // update status kendaraan dengan value Tidak ada
    $db->update('kendaraan',array(
      'status_rental'=>'Tidak Ada'
    ),
      "id=$kendaraan_id"
    ); 

    // redirect to list
      header('Location: /rental/index.php?module=rental-pelanggan');
      exit();
  }

  
}
?>