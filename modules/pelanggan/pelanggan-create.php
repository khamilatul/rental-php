<?php 
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=pelanggan">Pelanggan</a></li>
  <li class="disabled">Create Data Pelanggan</li>
</ul>
</nav>
<form action="" method="post">

<!-- field nip -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nip" class="text-right middle">Nomor Pelanggan</label>
  </div>
  <div class="small-6 cell">
  <?php
    $db = new Database();
    $db->selectMax('pelanggan','id');
    $res = $db->getResult();
    $nip = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
    $value = 'PL000'.$nip;
    echo "<input type='text' name='nip' value='$value' placeholder='NIP' readonly>";
  ?>
  </div>
</div>

<!-- field NO KTP -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="no_ktp" class="text-right middle">No KTP</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="no_ktp" placeholder="NO KTP" required>
  </div>
</div>

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Pelanggan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama Pelanggan" required>
  </div>
</div>
<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="alamat" class="text-right middle">Alamat Pelanggan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="Alamat Pelanggan" required>
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
$id = $_POST['id'];
$nip = $_POST['nip'];
$no_ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
  $db=new Database();
  $db->insert('pelanggan',array('id'=>$id, 'nip'=>$nip, 'no_ktp'=>$no_ktp, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp));
  $res=$db->getResult();
  // redirect to list
  header('Location: /rental/index.php?module=pelanggan');
}
?>