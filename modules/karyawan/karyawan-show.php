<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=karyawan?">Home</a></li>
  <li class="disabled">Detail Karyawan</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('karyawan','*','','','','', "id=$id");
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
      <td width="200px">NIK :</td>
      <td><?php echo $r['nik']; ?></td>
    </tr>
    <tr>
      <td>Nama Karyawan :</td>
      <td><?php echo $r['nama']; ?></td>
    </tr>
    <tr>
      <td>Alamat Karyawan :</td>
      <td><?php echo $r['alamat']; ?></td>
    </tr>
    <tr>
      <td>No Telepon :</td>
      <td><?php echo $r['telp']; ?></td>
    </tr>
  </tbody>
</table>
<a href="?module=karyawan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>