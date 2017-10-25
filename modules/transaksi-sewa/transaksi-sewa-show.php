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
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
<tr>
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
<tr>
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
<tr>
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
<tr>
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
<tr>
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
<tr>
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
<tr>
  <td>ID transaksi_sewa :</td>
  <td><?php echo $r['id']; ?></td>
</tr>
<tr>
  <td>Nama transaksi_sewa :</td>
  <td><?php echo $r['nama']; ?></td>
</tr>
<tr>
  <td>Merk ID :</td>
  <td><?php echo $r['merk_id']; ?></td>
</tr>
  </tbody>
</table>
<a href="?module=transaksi-sewa-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>