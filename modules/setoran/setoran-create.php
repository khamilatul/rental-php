<?php
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
  <li><a href="?module=home">Home</a></li>
  <li><a href="?module=setoran">Setoran</a></li>
  <li class="disabled">Create Data Setoran</li>
</ul>
</nav>
<form action="" method="post">
  
  <!-- field tanggal -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl" class="text-right middle">Tanggal Setoran</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tgl" placeholder="Tanggal Setoran" required>
    </div>
  </div>

  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">Jumlah Setoran</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="Jumlah Setoran" required>
    </div>
  </div>

  <!-- field ID Pemilik -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pemilik_id" class="text-right middle">ID Pemilik</label>
    </div>
    <div class="small-6 cell">
      <select name="pemilik_id">
      <?php
        $db = new Database();
        $db->select('pemilik','id, nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div>

  <!-- field ID Karyawan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="karyawan_id" class="text-right middle">ID Karyawan</label>
    </div>
    <div class="small-6 cell">
      <select name="karyawan_id">
      <?php
        $db = new Database();
        $db->select('karyawan','id, nama');
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

// check action submit
if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $tgl = $_POST['tgl'];
  $jumlah = $_POST['jumlah'];
  $pemilik_id = $_POST['pemilik_id'];
  $karyawan_id = $_POST['karyawan_id'];
  
    $db=new Database();
    $db->insert('setoran',array('no'=>$no, 'tgl'=>$tgl, 'jumlah'=>$jumlah, 'pemilik_id'=>$pemilik_id, 'karyawan_id'=>$karyawan_id));
    $res=$db->getResult();
    //print_r($res);
    // redirect to list
   header('Location: /rental/index.php?module=setoran');
} 
?>
</html>
</body>