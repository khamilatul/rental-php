<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('pemilik','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pemilik-edit?">Home</a></li>
  <li class="disabled">Edit Data Pemilik</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field kode -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">Kode Pemilik</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kode" placeholder="Kode Pemilik" value="<?php echo $r['kode']; ?>" readonly>
    </div>
  </div>

  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama Pemilik</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama Pemilik" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>

  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat Pemilik</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="alamat" placeholder="Alamat Pemilik" value="<?php echo $r['alamat']; ?>" required>
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


  <!-- field kendaraan_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kendaraan_id" class="text-right middle">Kendaraan ID</label>
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
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $kendaraan_id = $_POST['kendaraan_id'];
  $db = new Database();
  $db->update('pemilik',array(
    'kode'=>$kode,
    'nama'=>$nama,
    'alamat'=>$alamat,
    'telp'=>$telp,
    'kendaraan_id'=>$kendaraan_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /rental/index.php?module=pemilik');
}

?>