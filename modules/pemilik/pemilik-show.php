<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pemilik?">Home</a></li>
  <li class="disabled">Detail Pemilik</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('pemilik',
 'pemilik.id, 
  pemilik.kode,
  pemilik.nama, 
  pemilik.alamat, 
  pemilik.telp, 
  pemilik.kendaraan_id, kendaraan.no_plat',
  'kendaraan ON kendaraan.id=pemilik.kendaraan_id',
  '',
  '',
  '',
  "pemilik.id=$id"
  );
$res= $db->getResult();
if(count($res) == 0){ ?>
  <table>
    <tbody>
      <tr>
        <td>Data yang anda cari tidak ada atau terhapus</td>
      </tr>
    </tbody>
  </table>
<?php }else{
  foreach ($res as &$r){ 
?>
<table>
  <tbody>
  <tr>
  <td>Kode Pemilik :</td>
  <td><?php echo $r['kode']; ?></td>
</tr>
<tr>
  <td>Nama pemilik :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Alamat pemilik :</td>
  <td><?php echo $r['alamat']; ?></td>
</tr>
<tr>
  <td>No Telepon :</td>
  <td><?php echo $r['telp']; ?></td>
</tr>
<tr>
  <td>Kendaraan ID :</td>
  <td><?php echo $r['no_plat']; ?></td>
</tr>
  </tbody>
</table>
<a href="?module=pemilik-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>