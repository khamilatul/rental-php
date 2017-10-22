<?php
require_once("database.php");
?>
<?php ob_start();?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=transaksi-sewa-create-create?">Home</a></li>
  <li class="disabled">Create Data transaksi Sewa</li>
</ul>
</nav>
<form action="" method="post">

<!-- field no -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="no" class="text-right middle">Nomor</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="no" placeholder="no" required>
  </div>
</div>

<!-- field tglpesan -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tglpesan" class="text-right middle">tglpesan</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tglpesan" placeholder="tglpesan" required>
  </div>
</div>

<!-- field tglpinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tglpinjam" class="text-right middle">tglpinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tglpinjam" placeholder="tglpinjam" required>
  </div>
</div>

<!-- field tgl_kembali_rencana -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl_kembali_rencana" class="text-right middle">Tanggal Kembali</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl_kembali_rencana" placeholder="tgl_kembali_rencana" required>
  </div>
</div>

<!-- field jam_kembali_rencana -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jam_kembali_rencana" class="text-right middle">Jam Kembali Rencana</label>
  </div>
  <div class="small-6 cell">
    <input type="time" name="jam_kembali_rencana" placeholder="jam_kembali_rencana" required>
  </div>
</div>

<!-- field tgl_kembali_realisasi -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl_kembali_realisasi" class="text-right middle">Tanggal Kembali Realisasi</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl_kembali_realisasi" placeholder="tgl_kembali_realisasi" required>
  </div>
</div>
<!-- field jam_kembali_realisasi -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jam_kembali_realisasi" class="text-right middle">Jam Kembali Realisasi</label>
  </div>
  <div class="small-6 cell">
    <input type="time" name="jam_kembali_realisasi" placeholder="jam_kembali_realisasi" required>
  </div>
</div>
<!-- field denda -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="denda" class="text-right middle">Denda</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="denda" placeholder="denda" required>
  </div>
</div>
<!-- field kilometer_pinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kilometer_pinjam" class="text-right middle">Kilometer Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kilometer_pinjam" placeholder="kilometer_pinjam" required>
  </div>
</div>
<!-- field kilometer_kembali -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kilometer_kembali" class="text-right middle">Kilometer Kembali</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kilometer_kembali" placeholder="kilometer_kembali" required>
  </div>
</div>
<!-- field BBM_pinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="BBM_pinjam" class="text-right middle">BBM Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="BBM_pinjam" placeholder="BBM_pinjam" required>
  </div>
</div>
<!-- field BBM_kembali -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="BBM_kembali" class="text-right middle">BBM Kembali</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="BBM_kembali" placeholder="BBM_kembali" required>
  </div>
</div>
<!-- field kondisi_mobil_pinjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kondisi_mobil_pinjam" class="text-right middle">Kondisi Mobil Pinjam</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kondisi_mobil_pinjam" placeholder="kondisi_mobil_pinjam" required>
  </div>
</div>
<!-- field kondisi_mobil_kembali -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kondisi_mobil_kembali" class="text-right middle">Kondisi Mobil Kembali</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kondisi_mobil_kembali" placeholder="kondisi_mobil_kembali" required>
  </div>
</div>
<!-- field kerusakan -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kerusakan" class="text-right middle">kerusakan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kerusakan" placeholder="kerusakan" required>
  </div>
</div>
<!-- field biaya_kerusakan -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="biaya_kerusakan" class="text-right middle">Biaya Kerusakan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="biaya_kerusakan" placeholder="biaya_kerusakan" required>
  </div>
</div>
<!-- field biaya_BBM -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="biaya_BBM" class="text-right middle">Biaya BBM</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="biaya_BBM" placeholder="biaya_BBM" required>
  </div>
</div>
<!-- field sopir_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="sopir_id" class="text-right middle">ID Sopir</label>
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
  <div class="small-3 cell">
    <label for="kendaraan_id" class="text-right middle">ID Kendaraan</label>
  </div>
  <div class="small-6 cell">
  <select name="kendaraan_id">
  <?php
    $db = new Database();
    $db->select('kendaraan','id, no_plat');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[no_plat]</option>";
    }    
  ?>
  </select>
  </div>
  </div>

<!-- field pelanggan_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="pelanggan_id" class="text-right middle">ID Pelanggan </label>
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
    <label for="karyawan_id" class="text-right middle">ID Karyawan</label>
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
$tgl_kembali_rencana = $_POST['tgl_kembali_rencana'];
$jam_kembali_rencana = $_POST['jam_kembali_rencana'];
$tgl_kembali_realisasi = $_POST['tgl_kembali_realisasi'];
$jam_kembali_realisasi = $_POST['jam_kembali_realisasi'];
$denda = $_POST['denda'];
$kilometer_pinjam = $_POST['kilometer_pinjam'];
$kilometer_kembali = $_POST['kilometer_kembali'];
$BBM_pinjam = $_POST['BBM_pinjam'];
$BBM_kembali = $_POST['BBM_kembali'];
$kondisi_mobil_pinjam = $_POST['kondisi_mobil_pinjam'];
$kondisi_mobil_kembali = $_POST['kondisi_mobil_kembali'];
$kerusakan = $_POST['kerusakan'];
$biaya_kerusakan = $_POST['biaya_kerusakan'];
$biaya_BBM = $_POST['biaya_BBM'];
$sopir_id = $_POST['sopir_id'];
$kendaraan_id	 = $_POST['kendaraan_id'];
$pelanggan_id = $_POST['pelanggan_id'];
$karyawan_id = $_POST['karyawan_id'];

  $db=new Database();
  $db->insert('transaksisewa',array(
    'no' => $no,
    'tglpesan' => $tglpesan,
    'tglpinjam' => $tglpinjam,
    'tgl_kembali_rencana' => $tgl_kembali_rencana,
    'jam_kembali_rencana' => $jam_kembali_rencana,
    'tgl_kembali_realisasi' => $tgl_kembali_realisasi,
    'jam_kembali_realisasi' => $jam_kembali_realisasi,
    'denda' => $denda,
    'kilometer_pinjam' => $kilometer_pinjam,
    'kilometer_kembali' => $kilometer_kembali,
    'BBM_pinjam' => $BBM_pinjam,
    'BBM_kembali' => $BBM_kembali,
    'kondisi_mobil_pinjam' => $kondisi_mobil_pinjam,
    'kondisi_mobil_kembali' => $kondisi_mobil_kembali,
    'kerusakan' => $kerusakan,
    'biaya_kerusakan' => $biaya_kerusakan,
    'biaya_BBM' => $biaya_BBM,
    'sopir_id' => $sopir_id,
    'kendaraan_id' =>$kendaraan_id,
    'pelanggan_id' => $pelanggan_id,
    'karyawan_id' => $karyawan_id,
  ));
  $res=$db->getResult();
  // redirect to list
    header('Location: /rental/index.php?module=transaksi-sewa');
    exit();
  
}
?>