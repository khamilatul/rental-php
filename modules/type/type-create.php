<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=type-create?">Home</a></li>
  <li class="disabled">Create Data type</li>
</ul>
</nav>
<form action="" method="post">

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama" required>
  </div>
</div>

<!-- field merk_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="merk_id" class="text-right middle">ID Merk</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="merk_id" placeholder="merk_id" required>
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
$nama = $_POST['nama'];
$merk_id = $_POST['merk_id'];
  $db=new Database();
  $db->insert('type',array('id'=>$id,'nama'=>$nama, 'merk_id'=>$merk_id));
  $res=$db->getResult();
  // redirect to list
  header('Location: /rental/index.php?module=type');
}
?>