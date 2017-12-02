<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('transaksisewa','*','','','','', "id=$id");
$res= $db->getResult();
// print_r($res);
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rental-pelanggan">Home</a></li>
  <li class="disabled">Transaksi Kembali</li>
</ul>
</nav>
<form action="" method="post">

<!-- field kendaraan_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kendaraan_id" class="text-right middle">NO Plat Kendaraan</label>
    </div>
    <div class="small-6 cell">
      <select name="kendaraan_id">
      <?php
        $db = new Database();
        $db->select('kendaraan','id, no_plat');
        $kendaraans = $db->getResult();
        foreach ($kendaraans as &$kendaraan){ 
          $selected =$r['kendaraan_id'] == $kendaraan['id'] ? 'selected' : '';
            echo "<option value=$kendaraan[id]  $selected > $kendaraan[no_plat] </option>";
        }?>
      </select>
    </div>
  </div>

<!-- field pelanggan_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pelanggan_id" class="text-right middle">Nama Pelanggan</label>
    </div>
    <div class="small-6 cell">
      <select name="pelanggan_id">
      <?php
        $db = new Database();
        $db->select('pelanggan','id, nama');
        $pelanggans = $db->getResult();
        foreach ($pelanggans as &$pelanggan){ 
          $selected =$r['pelanggan_id'] == $pelanggan['id'] ? 'selected' : '';
            echo "<option value=$pelanggan[id]  $selected > $pelanggan[nama] </option>";
        }?>
      </select>
    </div>
  </div>

 <!-- field tgl_kembali_realisasi -->
 <div class="grid-x grid-padding-x">
 <div class="small-3 cell">
   <label for="tgl_kembali_realisasi" class="text-right middle">Tanggal Kembali Realisasi</label>
 </div>
 <div class="small-6 cell">
   <input type="date" name="tgl_kembali_realisasi" placeholder="Tanggal Kembali Realisasi" value="<?php echo $r['tgl_kembali_realisasi']; ?>" required>
 </div>
</div>

    <!-- field jam_kembali_realisasi -->
    <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jam_kembali_realisasi" class="text-right middle">Jam Kembali Realisasi</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="time" name="jam_kembali_realisasi" placeholder="Jam Kembali Realisasi" value="<?php echo $r['jam_kembali_realisasi']; ?>" required>
    </div>
  </div>

  <!-- field denda -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="denda" class="text-right middle">Denda</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="denda" placeholder="Denda" value="<?php echo $r['denda']; ?>" required>
    </div>
  </div>

  <!-- field kilometer_kembali -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kilometer_kembali" class="text-right middle">Kilometer Kembali</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="kilometer_kembali" placeholder="Kilometer Kembali" value="<?php echo $r['kilometer_kembali']; ?>" required>
    </div>
  </div>

  <!-- field BBM_kembali -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="BBM_kembali" class="text-right middle">BBM Kembali</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="BBM_kembali" placeholder="BBM Kembali" value="<?php echo $r['BBM_kembali']; ?>" required>
    </div>
  </div>

  <!-- field kondisi_mobil_kembali -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kondisi_mobil_kembali" class="text-right middle">Kondisi Mobil Kembali</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="kondisi_mobil_kembali" placeholder="Kondisi Mobil Kembali" value="<?php echo $r['kondisi_mobil_kembali']; ?>" required>
    </div>
  </div>

  <!-- field kerusakan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kerusakan" class="text-right middle">Kerusakan</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kerusakan" placeholder="Kerusakan" value="<?php echo $r['kerusakan']; ?>" required>
    </div>
  </div>

  <!-- field biaya_kerusakan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="biaya_kerusakan" class="text-right middle">Biaya Kerusakan</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="biaya_kerusakan" placeholder="Biaya Kerusakan" value="<?php echo $r['biaya_kerusakan']; ?>" required>
    </div>
  </div>

  <!-- field biaya_BBM -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="biaya_BBM" class="text-right middle">Biaya BBM</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="biaya_BBM" placeholder="Biaya BBM" value="<?php echo $r['biaya_BBM']; ?>" required>
    </div>
  </div>
  
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle"></label>
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
   }
}
?>
<?php
// check action submit
if(isset($_POST['submit'])){
  $tgl_kembali_realisasi = $_POST['tgl_kembali_realisasi'];
  $jam_kembali_realisasi = $_POST['jam_kembali_realisasi'];
  $denda = $_POST['denda'];
  $kilometer_kembali = $_POST['kilometer_kembali'];
  $BBM_kembali = $_POST['BBM_kembali'];
  $kondisi_mobil_kembali = $_POST['kondisi_mobil_kembali'];
  $kerusakan = $_POST['kerusakan'];
  $biaya_kerusakan = $_POST['biaya_kerusakan'];
  $biaya_BBM = $_POST['biaya_BBM'];

  
  $db = new Database();
  $db->update('transaksisewa',array(
    'tgl_kembali_realisasi' => $tgl_kembali_realisasi,
    'jam_kembali_realisasi' => $jam_kembali_realisasi,
    'denda' => $denda,
    'kilometer_kembali' => $kilometer_kembali,
    'BBM_kembali' => $BBM_kembali,
    'kondisi_mobil_kembali' => $kondisi_mobil_kembali,
    'kerusakan' => $kerusakan,
    'biaya_kerusakan' => $biaya_kerusakan,
    'biaya_BBM' => $biaya_BBM,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /rental/index.php?module=rental-pelanggan');
}

?>