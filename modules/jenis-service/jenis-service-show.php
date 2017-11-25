<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=jenis-service?">Home</a></li>
  <li class="disabled">Detail Jenis Service</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('jenis_service','*','','','','', "id=$id");
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
      <td width="200px">Kode Jenis Service :</td>
      <td><?php echo $r['kode']; ?></td>
    </tr>
    <tr>
      <td>Nama Jenis Service :</td>
      <td><?php echo $r['nama']; ?></td>
    </tr>
  </tbody>
</table>
<a href="?module=jenis-service-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>