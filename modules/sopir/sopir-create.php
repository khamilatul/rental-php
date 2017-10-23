<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=sopir-create?">Home</a></li>
  <li class="disabled">Create Data Sopir</li>
</ul>
</nav>
<form action="" method="post">

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
require_once("database.php");

// check action submit
if(isset($_POST['submit'])){
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$no_sim = $_POST['no_sim'];
$tarif_perjam = $_POST['tarif_perjam'];
  $db=new Database();
  $db->insert('sopir',array('nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp, 'no_sim'=>$no_sim, 'tarif_perjam'=>$tarif_perjam));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
 header('Location: /rental/index.php?module=sopir');
}
?>