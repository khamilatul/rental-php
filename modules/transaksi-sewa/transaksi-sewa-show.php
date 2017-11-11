<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=transaksi-sewa?">Home</a></li>
  <li class="disabled">Detail transaksi-sewa</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('transaksi_sewa','*','','','','', "id=$id");
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
  <td>NO Transaksi Sewa :</td>
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
  <td><?php echo $r['sopir_id']; ?></td>
</tr>
<tr>
  <td>Kendaraan ID :</td>
  <td><?php echo $r['kendaraan_id']; ?></td>
</tr>
<tr>
  <td>Pelanggan ID :</td>
  <td><?php echo $r['pelanggan_id']; ?></td>
</tr>
<tr>
  <td>Karyawan ID :</td>
  <td><?php echo $r['karyawan_id']; ?></td>
</tr>
  </tbody>
</table>
<a href="?module=transaksi-sewa-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>