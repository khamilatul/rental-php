<?php 
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=pemilik">Pemilik</a></li>
  <li class="disabled">Create Data Pemilik</li>
</ul>
</nav>
<form action="" method="post">

<!-- field kode -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="kode" class="text-right middle">Kode Pemilik </label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('pemilik','id');
  $res = $db->getResult();
  $kode = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'PMLK000'.$kode;
  echo "<input type='text' name='kode' value='$value' placeholder='Kode Pemilik' readonly>";
?>
</div>
</div>

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Pemilik</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama Pemilik" required>
  </div>
</div>
<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="alamat" class="text-right middle">Alamat Pemilik</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="Alamat Pemilik" required>
  </div>
</div>
<!-- field telp -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="telp" class="text-right middle">No Telepon</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="telp" placeholder="No Telepon" required>
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
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$kendaraan_id = $_POST['kendaraan_id'];
  $db=new Database();
  $db->insert('pemilik',array('kode'=>$kode, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp, 'kendaraan_id'=>$kendaraan_id));
  $res=$db->getResult();
  // print_r($kode);
  // redirect to list
  header('Location: /rental/index.php?module=pemilik');
}
?>