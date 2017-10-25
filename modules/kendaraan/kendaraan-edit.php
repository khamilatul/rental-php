<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('kendaraan','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=kendaraan-edit?">Home</a></li>
  <li class="disabled">Edit Data Kendaraan</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field no_plat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="no_plat" class="text-right middle">NO PLAT</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="no_plat" placeholder="NO PLAT" value="<?php echo $r['no_plat']; ?>" required>
    </div>
  </div>

  <!-- field tahun -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tahun" class="text-right middle">Tahun</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="tahun" placeholder="Tahun" value="<?php echo $r['tahun']; ?>" required>
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

  <!-- field status_rental -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="status_rental" class="text-right middle">Status Rental</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="status_rental" placeholder="Status Rental" value="<?php echo $r['status_rental']; ?>" required>
  </div>
</div>


  <!-- field type_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="type_id" class="text-right middle">Type ID</label>
    </div>
    <div class="small-6 cell">
      <select name="type_id">
      <?php
        $db = new Database();
        $db->select('type','id, nama');
        $types = $db->getResult();
        foreach ($types as &$type){ 
          $selected =$r['type_id'] == $type['id'] ? 'selected' : '';
            echo "<option value=$type[id]  $selected > $type[nama] </option>";
        }?>
      </select>
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
   }
}
?>
<?php
// check action submit
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $no_plat = $_POST['no_plat'];
  $tahun = $_POST['tahun'];
  $tarif_perjam = $_POST['tarif_perjam'];
  $status_rental = $_POST['status_rental'];
  $type_id = $_POST['type_id'];
  $db = new Database();
  $db->update('kendaraan',array(
    'no_plat'=>$no_plat,
    'tahun'=>$tahun,
    'tarif_perjam'=>$tarif_perjam,
    'status_rental'=>$status_rental,
    'type_id'=>$type_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /rental/index.php?module=kendaraan');
}

?>