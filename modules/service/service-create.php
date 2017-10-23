<?php 
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=service-create?">Home</a></li>
  <li class="disabled">Create Data Service</li>
</ul>
</nav>
<form action="" method="post">

<!-- field kode_service -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kode_service" class="text-right middle">Kode Service</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kode_service" placeholder="Kode Service" required>
  </div>
</div>

<!-- field tgl -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl" class="text-right middle">Tanggal Service</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl" placeholder="Tanggal Service" required>
  </div>
</div>

<!-- field biaya -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="biaya" class="text-right middle">Biaya Service</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="biaya" placeholder="Biaya Service" required>
  </div>
</div>

<!-- field kendaraan_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kendaraan_id" class="text-right middle">ID kendaraan</label>
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

<!-- field jenis_service_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jenis_service_id" class="text-right middle">ID Jenis Service</label>
  </div>
  <div class="small-6 cell">
  <select name="jenis_service_id">
  <?php
    $db = new Database();
    $db->select('jenis_service','id, nama');
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
    <label for="tgl" class="text-right middle"></label>
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
$kode_service = $_POST['kode_service'];
$tgl = $_POST['tgl'];
$biaya = $_POST['biaya'];
$kendaraan_id = $_POST['kendaraan_id'];
$jenis_service_id = $_POST['jenis_service_id'];
  $db=new Database();
  $db->insert('service',array('id'=>$id, 'kode_service'=>$kode_service, 'tgl'=>$tgl, 'biaya'=>$biaya, 'kendaraan_id'=>$kendaraan_id, 'jenis_service_id'=>$jenis_service_id));
  $res=$db->getResult();
  // redirect to list
  header('Location: /rental/index.php?module=service');
}
?>