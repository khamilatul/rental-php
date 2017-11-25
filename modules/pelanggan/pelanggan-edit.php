<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('pelanggan','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pelanggan-edit?">Home</a></li>
  <li class="disabled">Edit Data Pelanggan</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nip -->
 <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nip" class="text-right middle">NIP</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nip" placeholder="NIP" value="<?php echo $r['nip']; ?>" readonly>
    </div>
  </div>

 <!-- field no_ktp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="no_ktp" class="text-right middle">NO KTP</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="no_ktp" placeholder="NO KTP" value="<?php echo $r['no_ktp']; ?>" required>
    </div>
  </div>
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama Pelanggan</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama Pelanggan" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>
  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat Pelanggan</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="alamat" placeholder="Alamat Pelanggan" value="<?php echo $r['alamat']; ?>" required>
    </div>
  </div>
  <!-- field telp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">No Telepon</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="telp" placeholder="No Telepon" value="<?php echo $r['telp']; ?>" required>
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
  $id = $_POST['id'];
  $no_ktp = $_POST['no_ktp'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $db = new Database();
  $db->update('pelanggan',array(
    'no_ktp'=>$no_ktp,
    'nama'=>$nama,
    'alamat'=>$alamat,
    'telp'=>$telp,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  
  header('Location: /rental/index.php?module=pelanggan');
}

?>