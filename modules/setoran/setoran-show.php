<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=setoran?">Home</a></li>
  <li class="disabled">Detail Setoran</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('setoran', 
'setoran.id, 
setoran.tgl, 
setoran.jumlah, 
setoran.pemilik_id,
pemilik.nama, 
setoran.karyawan_id,
karyawan.nama as karyawan',
'pemilik ON pemilik.id=setoran.pemilik_id',
'karyawan ON karyawan.id=setoran.karyawan_id',
'',
'',
"setoran.id=$id"
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
  <!-- <tr>
  <td>Kode Setoran :</td>
  <td><?php echo $r['no']; ?></td>
</tr> -->
<tr>
  <td>Tanggal Setoran :</td>
  <td><?php echo $r['tgl']; ?></td>
</tr>
<tr>
  <td>Jumlah Setoran :</td>
  <td><?php echo $r['jumlah']; ?></td>
</tr>
<tr>
  <td>Pemilik ID :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Karyawan ID :</td>
  <td><?php echo $r['karyawan']; ?></td>
</tr>
  </tbody>
</table>
<a href="?module=setoran-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>