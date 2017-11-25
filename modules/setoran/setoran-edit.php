<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('setoran','*','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=setoran-edit?">Home</a></li>
  <li class="disabled">Edit Data Setoran</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field no
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="no" class="text-right middle">no</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="no" placeholder="no" value="<?php echo $r['no']; ?>" required>
    </div>
  </div> -->

  <!-- field tgl -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl" class="text-right middle">Tanggal Setoran</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tgl" placeholder="Tanggal Setoran" value="<?php echo $r['tgl']; ?>" required>
    </div>
  </div>

  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">Jumlah Setoran</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="Jumlah Setoran" value="<?php echo $r['jumlah']; ?>" required>
    </div>
  </div>

  <!-- field pemilik_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pemilik_id" class="text-right middle">Pemilik ID</label>
    </div>
    <div class="small-6 cell">
      <select name="pemilik_id">
      <?php
        $db = new Database();
        $db->select('pemilik','id, nama');
        $pemiliks = $db->getResult();
        foreach ($pemiliks as &$pemilik){ 
          $selected =$r['pemilik_id'] == $pemilik['id'] ? 'selected' : '';
            echo "<option value=$pemilik[id]  $selected > $pemilik[nama] </option>";
        }?>
      </select>
    </div>
  </div>

  <!-- field karyawan_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="karyawan_id" class="text-right middle">Karyawan ID</label>
    </div>
    <div class="small-6 cell">
      <select name="karyawan_id">
      <?php
        $db = new Database();
        $db->select('karyawan','id, nama');
        $karyawans = $db->getResult();
        foreach ($karyawans as &$karyawan){ 
          $selected =$r['karyawan_id'] == $karyawan['id'] ? 'selected' : '';
            echo "<option value=$karyawan[id]  $selected > $karyawan[nama] </option>";
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
  $no = $_POST['no'];
  $tgl = $_POST['tgl'];
  $jumlah = $_POST['jumlah'];
  $pemilik_id = $_POST['pemilik_id'];
  $karyawan_id = $_POST['karyawan_id'];
  $db = new Database();
  $db->update('setoran',array(
    'no'=>$no,
    'tgl'=>$tgl,
    'jumlah'=>$jumlah,
    'pemilik_id'=>$pemilik_id,
    'karyawan_id'=>$karyawan_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /rental/index.php?module=setoran');
}

?>