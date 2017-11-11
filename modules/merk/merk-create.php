<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=merk">Merk</a></li>
  <li class="disabled">Create Data Merk</li>
</ul>
</nav>
<form action="" method="post">

<!-- field kode_merk -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kode_merk" class="text-right middle">Kode Merk</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kode_merk" placeholder="Kode Merk" required>
  </div>
</div>

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Merk</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama Merk" required>
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
$id = $_POST['id'];
$kode_merk = $_POST['kode_merk'];
$nama = $_POST['nama'];
  $db=new Database();
  $db->insert('merk',array('id'=>$id, 'kode_merk'=>$kode_merk, 'nama'=>$nama));
  $res=$db->getResult();
  // redirect to list
  header('Location: /rental/index.php?module=merk');
}
?>