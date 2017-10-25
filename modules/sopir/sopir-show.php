<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=sopir?">Home</a></li>
  <li class="disabled">Detail sopir</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('sopir','*','','','','', "id=$id");
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
  <td>Kode Sopir :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama Sopir :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Alamat Sopir :</td>
  <td><?php echo $r['alamat']; ?></td>
</tr>
<tr>
  <td>No Telepon :</td>
  <td><?php echo $r['telp']; ?></td>
</tr>
<tr>
  <td>NO SIM :</td>
  <td><?php echo $r['no_sim']; ?></td>
</tr>
<tr>
  <td>Tarif Perjam :</td>
  <td><?php echo $r['tarif_perjam']; ?></td>
</tr>
  </tbody>
</table>
<a href="?module=sopir-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>