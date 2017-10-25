<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=kendaraan?">Home</a></li>
  <li class="disabled">Detail kendaraan</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('kendaraan','*','','','','', "id=$id");
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
      <td>NO Plat :</td>
      <td><?php echo $r['no_plat']; ?></td>
    </tr>
    <tr>
      <td>Tahun :</td>
      <td><?php echo $r['tahun']; ?></td>
    </tr>
    <tr>
      <td>Tarif Perjam :</td>
      <td><?php echo $r['tarif_perjam']; ?></td>
    </tr>
    <tr>
      <td>Status Rental :</td>
      <td><?php echo $r['status_rental']; ?></td>
    </tr>
    <tr>
      <td>Type ID :</td>
      <td><?php echo $r['type_id']; ?></td>
    </tr>
  </tbody>
</table>
<a href="?module=kendaraan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>