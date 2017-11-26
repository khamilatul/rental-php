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
  <table id="print-area">
    <tbody>
      <tr>
        <td>Data yang anda cari tidak ada atau terhapus</td>
      </tr>
    </tbody>
  </table>
<?php }else{
  foreach ($res as &$r){ 
?>
<table id="print-area">
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
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=service-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>

<style>
@media print {
   * { color: black; background: white; }
   table { font-size: 80%; }
}
</style>

<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

<script type="text/javascript">
     
     function printDiv(elementId) {
    var a = document.getElementById('print-area').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>