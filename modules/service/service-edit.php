<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('service','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=service-edit?">Home</a></li>
  <li class="disabled">Edit Data Service</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field kode_service -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode_service" class="text-right middle">Kode Service</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kode_service" placeholder="Kode Service" value="<?php echo $r['kode_service']; ?>" readonly>
    </div>
  </div>

  <!-- field tgl -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl" class="text-right middle">Tanggal Service</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tgl" placeholder="Tanggal Service" value="<?php echo $r['tgl']; ?>" required>
    </div>
  </div>

  <!-- field biaya -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="biaya" class="text-right middle">Biaya Service</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="biaya" placeholder="Biaya Service" value="<?php echo $r['biaya']; ?>" required>
    </div>
  </div>

  <!-- field kendaraan_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kendaraan_id" class="text-right middle">NO PlatKendaraan</label>
    </div>
    <div class="small-6 cell">
      <select name="kendaraan_id">
      <?php
        $db = new Database();
        $db->select('kendaraan','id, no_plat');
        $kendaraans = $db->getResult();
        foreach ($kendaraans as &$kendaraan){ 
          $selected =$r['kendaraan_id'] == $kendaraan['id'] ? 'selected' : '';
            echo "<option value=$kendaraan[id]  $selected > $kendaraan[no_plat] </option>";
        }?>
      </select>
    </div>
  </div>

  <!-- field jenis_service_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jenis_service_id" class="text-right middle">Nama Jenis Service</label>
    </div>
    <div class="small-6 cell">
      <select name="jenis_service_id">
      <?php
        $db = new Database();
        $db->select('jenis_service','id, nama');
        $jenis_services = $db->getResult();
        foreach ($jenis_services as &$jenis_service){ 
          $selected =$r['jenis_service_id'] == $jenis_service['id'] ? 'selected' : '';
            echo "<option value=$jenis_service[id]  $selected > $jenis_service[nama] </option>";
        }?>
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
   }
}
?>
<?php
// check action submit
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $kode_service = $_POST['kode_service'];
  $tgl = $_POST['tgl'];
  $biaya = $_POST['biaya'];
  $kendaraan_id = $_POST['kendaraan_id'];
  $jenis_service_id = $_POST['jenis_service_id'];
  $db = new Database();
  $db->update('service',array(
    'kode_service'=>$kode_service,
    'tgl'=>$tgl,
    'biaya'=>$biaya,
    'kendaraan_id'=>$kendaraan_id,
    'jenis_service_id'=>$jenis_service_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /rental/index.php?module=service');
}

?>