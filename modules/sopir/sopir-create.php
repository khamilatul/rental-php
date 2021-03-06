<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=sopir">Sopir</a></li>
  <li class="disabled">Create Data Sopir</li>
</ul>
</nav>
<form action="" method="post">

<!-- field NIS -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nis" class="text-right middle">NIS</label>
  </div>
  <div class="small-6 cell">
  <?php
    $db = new Database();
    $db->selectMax('sopir','id');
    $res = $db->getResult();
    $nis = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
    $value = 'SPR00'.$nis;
    echo "<input type='text' name='nis' value='$value' placeholder='NIS' readonly>";
  ?>
  </div>
</div>

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Sopir</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama Sopir" required>
  </div>
</div>

<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="alamat" class="text-right middle">Alamat Sopir</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="Alamat Sopir" required>
  </div>
</div>

<!-- field telp -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="telp" class="text-right middle">NO Telepon</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="telp" placeholder="NO Telepon" required>
  </div>
</div>

<!-- field no_sim -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="no_sim" class="text-right middle">NO SIM</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="no_sim" placeholder="NO SIM" required>
  </div>
</div>

<!-- field tarif_perjam -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tarif_perjam" class="text-right middle">Tarif Perjam</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="tarif_perjam" placeholder="Tarif Perjam" required>
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

// check action submit
if(isset($_POST['submit'])){
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$no_sim = $_POST['no_sim'];
$tarif_perjam = $_POST['tarif_perjam'];
  $db=new Database();
  $db->insert('sopir',array('nis'=>$nis, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp, 'no_sim'=>$no_sim, 'tarif_perjam'=>$tarif_perjam));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
 header('Location: /rental/index.php?module=sopir');
}
?>