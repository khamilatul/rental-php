<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rental-pelanggan?">Home</a></li>
  <li class="disabled">Detail Rental Pelanggan</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('transaksisewa', 
'transaksisewa.id, 
transaksisewa.no,
transaksisewa.tglpinjam,
transaksisewa.tglpesan,
transaksisewa.kendaraan_id,
transaksisewa.pelanggan_id,
transaksisewa.tgl_kembali_rencana,
transaksisewa.tgl_kembali_realisasi,
transaksisewa.jam_kembali_rencana,
transaksisewa.jam_kembali_realisasi,
transaksisewa.denda,
transaksisewa.kilometer_pinjam,
transaksisewa.kilometer_kembali,
transaksisewa.BBM_pinjam,
transaksisewa.BBM_kembali,
transaksisewa.kondisi_mobil_pinjam,
transaksisewa.kondisi_mobil_kembali,
transaksisewa.kerusakan,
transaksisewa.biaya_kerusakan,
transaksisewa.biaya_BBM,
transaksisewa.sopir_id, 
transaksisewa.kendaraan_id,
transaksisewa.pelanggan_id, 
transaksisewa.karyawan_id,
sopir.nama as sopir,
kendaraan.no_plat as kendaraan,
pelanggan.nama as pelanggan,
karyawan.nama as karyawan',
'sopir ON sopir.id = transaksisewa.sopir_id',
'kendaraan ON kendaraan.id = transaksisewa.kendaraan_id',
'pelanggan ON pelanggan.id = transaksisewa.pelanggan_id',
'karyawan ON karyawan.id = transaksisewa.karyawan_id' , "transaksisewa.id=$id"
);
$res= $db->getResult();
// print_r($res);
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
<table id="print-area">
  <tbody>
  <tr>
  <td>Nomor Transaksi Sewa :</td>
  <td><?php echo $r['no']; ?></td>
</tr>
<tr>
  <td>Tanggal Pesan :</td>
  <td><?php echo $r['tglpesan']; ?></td>
</tr>
<tr>
  <td>Tanggal Pinjam :</td>
  <td><?php echo $r['tglpinjam']; ?></td>
</tr>
<tr>
  <td>Tanggal Kembali Rencana :</td>
  <td><?php echo $r['tgl_kembali_rencana']; ?></td>
</tr>
<tr>
  <td>Jam Kembali Rencana :</td>
  <td><?php echo $r['jam_kembali_rencana']; ?></td>
</tr>
<tr>
  <td>Tanggal Kembali Realisasi :</td>
  <td><?php echo $r['tgl_kembali_realisasi']; ?></td>
</tr>
<tr>
  <td>Jam Kembali realisasi :</td>
  <td><?php echo $r['jam_kembali_realisasi']; ?></td>
</tr>
<tr>
  <td>Denda :</td>
  <td><?php echo $r['denda']; ?></td>
</tr>
<tr>
  <td>Kilometer Pinjam :</td>
  <td><?php echo $r['kilometer_pinjam']; ?></td>
</tr>
<tr>
  <td>Kilometer Kembali :</td>
  <td><?php echo $r['kilometer_kembali']; ?></td>
</tr>
<tr>
  <td>BBM Pinjam :</td>
  <td><?php echo $r['BBM_pinjam']; ?></td>
</tr>
<tr>
  <td>BBM Kembali :</td>
  <td><?php echo $r['BBM_kembali']; ?></td>
</tr>
<tr>
  <td>Kondisi Mobil Pinjam :</td>
  <td><?php echo $r['kondisi_mobil_pinjam']; ?></td>
</tr>
<tr>
  <td>Kondisi Mobil Kembali  :</td>
  <td><?php echo $r['kondisi_mobil_kembali']; ?></td>
</tr>
<tr>
  <td>Kerusakan :</td>
  <td><?php echo $r['kerusakan']; ?></td>
</tr>
<tr>
  <td>Biaya Kerusakan :</td>
  <td><?php echo $r['biaya_kerusakan']; ?></td>
</tr>
<tr>
  <td>Biaya BBM :</td>
  <td><?php echo $r['biaya_BBM']; ?></td>
</tr>
<tr>
  <td>Sopir ID :</td>
  <td><?php echo $r['sopir']; ?></td>
</tr>
<tr>
  <td>Kendaraan ID :</td>
  <td><?php echo $r['kendaraan']; ?></td>
</tr>
<tr>
  <td>Pelanggan ID :</td>
  <td><?php echo $r['pelanggan']; ?></td>
</tr>
<tr>
  <td>Karyawan ID :</td>
  <td><?php echo $r['karyawan']; ?></td>
</tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=rental-pelanggan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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
