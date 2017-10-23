<?php 
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=kendaraan-create?">Home</a></li>
  <li class="disabled">Create Data Kendaraan</li>
</ul>
</nav>
<form action="" method="post">

<!-- field no_plat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="no_plat" class="text-right middle">NO Plat</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="no_plat" placeholder="NO Plat" required>
  </div>
</div>

<!-- field tahun -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tahun" class="text-right middle">Tahun</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="tahun" placeholder="Tahun" required>
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

<!-- field status_rental -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="status_rental" class="text-right middle">Status Rental</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="status_rental" placeholder="Status Rental" required>
  </div>
</div>

<!-- field type_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="type_id" class="text-right middle">Type Id</label>
  </div>
  <div class="small-6 cell">
  <select name="type_id">
  <?php
    $db = new Database();
    $db->select('type','id, nama');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[nama]</option>";
    }    
  ?>
  </select>
</div>
</div>

<!-- Aksi -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tahun" class="text-right middle"></label>
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
$no_plat = $_POST['no_plat'];
$tahun = $_POST['tahun'];
$tarif_perjam = $_POST['tarif_perjam'];
$status_rental = $_POST['status_rental'];
$type_id = $_POST['type_id'];
  $db=new Database();
  $db->insert('kendaraan',array('id'=>$id, 'no_plat'=>$no_plat, 'tahun'=>$tahun, 'tarif_perjam'=>$tarif_perjam, 'status_rental'=>$status_rental, 'type_id'=>$type_id));
  $res=$db->getResult();
  // redirect to list
  header('Location: /rental/index.php?module=kendaraan');
}
?>