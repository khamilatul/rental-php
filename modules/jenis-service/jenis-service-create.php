<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=jenis-service">Jenis Service</a></li>
  <li class="disabled">Create Data Jenis Service</li>
</ul>
</nav>
<form action="" method="post">

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Jenis Service</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama Jenis Service" required>
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
$nama = $_POST['nama'];
  $db=new Database();
  $db->insert('jenis_service',array('id'=>$id,'nama'=>$nama));
  $res=$db->getResult();
  // redirect to list
  header('Location: /rental/index.php?module=jenis-service');
}
?>