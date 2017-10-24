<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('sopir','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=sopir-edit?">Home</a></li>
  <li class="disabled">Data Edit sopir</li>
</ul>
</nav>
<form action="" method="post">

  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>

  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $r['alamat']; ?>" required>
    </div>
  </div>

  <!-- field telp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">Telphone</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="telp" placeholder="Telphone" value="<?php echo $r['telp']; ?>" required>
    </div>
  </div>

  <!-- field no_sim -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="no_sim" class="text-right middle">NO SIM</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="no_sim" placeholder="NO SIM" value="<?php echo $r['no_sim']; ?>" required>
    </div>
  </div>

  <!-- field tarif_perjam -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tarif_perjam" class="text-right middle">Tarif Perjam</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="tarif_perjam" placeholder="Tarif Perjam" value="<?php echo $r['tarif_perjam']; ?>" required>
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
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $no_sim = $_POST['no_sim'];
  $tarif_perjam = $_POST['tarif_perjam'];
  $db = new Database();
  $db->update('sopir',array(
    'nama'=>$nama,
    'alamat'=>$alamat,
    'telp'=>$telp,
    'no_sim'=>$no_sim,
    'tarif_perjam'=>$tarif_perjam,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  
  header('Location: /rental/index.php?module=sopir');
}

?>