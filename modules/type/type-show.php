<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=type?">Home</a></li>
  <li class="disabled">Detail type</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('type',
'type.id, type.nama, type.merk_id, merk.nama as merk',
'merk ON merk.id = type.merk_id',
'',
'',
'',
"type.id=$id"
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
  <td>ID type :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama type :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk']; ?></td>
</tr>
  </tbody>
</table>
<a href="?module=type-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>