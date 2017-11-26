<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=service?">Home</a></li>
  <li class="disabled">Detail Service</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('service', 
'service.id, 
service.kode_service, 
service.tgl,
 service.biaya,
 service.kendaraan_id, 
 kendaraan.no_plat, 
 jenis_service.nama as jenis_service',
'kendaraan ON kendaraan.id=service.kendaraan_id',
'jenis_service ON jenis_service.id=service.jenis_service_id',
'',
'',
"service.id=$id"
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
  <td>Kode service :</td>
  <td><?php echo $r['kode_service']; ?></td>
</tr>
<tr>
  <td>Tanggal Service :</td>
  <td><?php echo $r['tgl']; ?></td>
</tr>
<tr>
  <td>Biaya service :</td>
  <td><?php echo $r['biaya']; ?></td>
</tr>
<tr>
  <td>Kendaraan ID :</td>
  <td><?php echo $r['no_plat']; ?></td>
</tr>
<tr>
  <td>Jenis Service ID :</td>
  <td><?php echo $r['jenis_service']; ?></td>
</tr>
  </tbody>
</table>
<a href="?module=service-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>