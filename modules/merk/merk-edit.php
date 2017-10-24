<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('merk','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
    // print_r($res);
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=merk-edit?">Home</a></li>
  <li class="disabled">Data Edit merk</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field kode_merk -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode_merk" class="text-right middle">kode_merk</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kode_merk" placeholder="kode_merk" value="<?php echo $r['kode_merk']; ?>" required>
    </div>
  </div>

  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" value="<?php echo $r['nama']; ?>" required>
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
  $kode_merk = $_POST['kode_merk'];
  $nama = $_POST['nama'];
  $db = new Database();
  $db->update('merk',array(
    'kode_merk'=>$kode_merk,
    'nama'=>$nama,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  
  header('Location: /rental/index.php?module=merk');
}

?>