<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('type','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=type-edit?">Home</a></li>
  <li class="disabled">vEdit Data Type</li>
</ul>
</nav>
<form action="" method="post">

  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama Type</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama Type" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>

  <!-- field merk_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="merk_id" class="text-right middle">Nama Merk</label>
    </div>
    <div class="small-6 cell">
      <select name="merk_id">
      <?php
        $db = new Database();
        $db->select('merk','id, nama');
        $merks = $db->getResult();
        foreach ($merks as &$merk){ 
          $selected =$r['merk_id'] == $merk['id'] ? 'selected' : '';
            echo "<option value=$merk[id]  $selected > $merk[nama] </option>";
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
  $nama = $_POST['nama'];
  $merk_id = $_POST['merk_id'];
  $db = new Database();
  $db->update('type',array(
    'nama'=>$nama,
    'merk_id'=>$merk_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /rental/index.php?module=type');
}

?>