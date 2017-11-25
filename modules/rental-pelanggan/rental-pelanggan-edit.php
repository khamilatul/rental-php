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
    <a href="?module=rental-pelanggan?">Home</a></li>
  <li class="disabled">Edit Data Rental Pelanggan</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field no -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="no" class="text-right middle">NOmor Transaksi</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="no" placeholder="NOmor Transaksi" value="<?php echo $r['no']; ?>" required>
    </div>
  </div>

  <!-- field tglpesan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tglpesan" class="text-right middle">Tanggal Pesan</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tglpesan" placeholder="Tanggal Pesan" value="<?php echo $r['tglpesan']; ?>" required>
    </div>
  </div>

  <!-- field tglpinjam -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tglpinjam" class="text-right middle">Tanggal Pinjam</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="tglpinjam" placeholder="Tanggal Pinjam" value="<?php echo $r['tglpinjam']; ?>" required>
    </div>
  </div>

  <!-- field tgl_kembali_rencana -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl_kembali_rencana" class="text-right middle">Tanggal Kembali Rencana</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tgl_kembali_rencana" placeholder="Tanggal Kembali Rencana" value="<?php echo $r['tgl_kembali_rencana']; ?>" required>
    </div>
  </div>

  <!-- field jam_kembali_rencana -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jam_kembali_rencana" class="text-right middle">Jam Kembali Rencana</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="jam_kembali_rencana" placeholder="Jam Kembali Rencana" value="<?php echo $r['jam_kembali_rencana']; ?>" required>
    </div>
  </div>

    <!-- field kilometer_pinjam -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kilometer_pinjam" class="text-right middle">Kilometer Pinjam</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kilometer_pinjam" placeholder="Kilometer Pinjam" value="<?php echo $r['kilometer_pinjam']; ?>" required>
    </div>
  </div>

  <!-- field BBM_pinjam -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="BBM_pinjam" class="text-right middle">BBM Pinjam</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="BBM_pinjam" placeholder="BBM Pinjam" value="<?php echo $r['BBM_pinjam']; ?>" required>
    </div>
  </div>

  <!-- field kondisi_mobil_pinjam -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kondisi_mobil_pinjam" class="text-right middle">Kondisi Mobil Pinjam</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kondisi_mobil_pinjam" placeholder="Kondisi Mobil Pinjam" value="<?php echo $r['kondisi_mobil_pinjam']; ?>" required>
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

<!-- field sopir_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="sopir_id" class="text-right middle">Sopir ID</label>
    </div>
    <div class="small-6 cell">
      <select name="sopir_id">
      <?php
        $db = new Database();
        $db->select('sopir','id, nama');
        $sopirs = $db->getResult();
        foreach ($sopirs as &$sopir){ 
          $selected =$r['sopir_id'] == $sopir['id'] ? 'selected' : '';
            echo "<option value=$sopir[id]  $selected > $sopir[nama] </option>";
        }?>
      </select>
    </div>
  </div>

  <!-- field kendaraan_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kendaraan_id" class="text-right middle">Kendaraan ID</label>
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
      <label for="pelanggan_id" class="text-right middle">Pelanggan ID</label>
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

  <!-- field karyawan_id -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="karyawan_id" class="text-right middle">Karyawan ID</label>
    </div>
    <div class="small-6 cell">
      <select name="karyawan_id">
      <?php
        $db = new Database();
        $db->select('karyawan','id, nama');
        $karyawans = $db->getResult();
        foreach ($karyawans as &$karyawan){ 
          $selected =$r['karyawan_id'] == $karyawan['id'] ? 'selected' : '';
            echo "<option value=$karyawan[id]  $selected > $karyawan[nama] </option>";
        }?>
      </select>
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
  $no = $_POST['no'];
  $tglpesan = $_POST['tglpesan'];
  $tglpinjam = $_POST['tglpinjam'];
  $tgl_kembali_rencana = $_POST['tgl_kembali_rencana'];
  $jam_kembali_rencana = $_POST['jam_kembali_rencana'];
  $kilometer_pinjam = $_POST['kilometer_pinjam'];
  $BBM_pinjam = $_POST['BBM_pinjam'];
  $kondisi_mobil_pinjam = $_POST['kondisi_mobil_pinjam'];
  $biaya_BBM = $_POST['biaya_BBM'];
  $sopir_id = $_POST['sopir_id'];
  $kendaraan_id	 = $_POST['kendaraan_id'];
  $pelanggan_id = $_POST['pelanggan_id'];
  $karyawan_id = $_POST['karyawan_id'];
  
  $db = new Database();
  $db->update('transaksisewa',array(
    'no' => $no,
    'tglpesan' => $tglpesan,
    'tglpinjam' => $tglpinjam,
    'tgl_kembali_rencana' => $tgl_kembali_rencana,
    'jam_kembali_rencana' => $jam_kembali_rencana,
    'kilometer_pinjam' => $kilometer_pinjam,
    'BBM_pinjam' => $BBM_pinjam,
    'kondisi_mobil_pinjam' => $kondisi_mobil_pinjam,
    'biaya_BBM' => $biaya_BBM,
    'sopir_id' => $sopir_id,
    'kendaraan_id' =>$kendaraan_id,
    'pelanggan_id' => $pelanggan_id,
    'karyawan_id' => $karyawan_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /rental/index.php?module=rental-pelanggan');
}

?>