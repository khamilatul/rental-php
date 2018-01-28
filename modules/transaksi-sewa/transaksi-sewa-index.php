<div class="grid-container">
<nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
<ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Transaksi Sewa</li>
  </ul>
</nav>
<div class="grid-x grid-margin-x">
    <a href="?module=transaksi-sewa-create" class="small button">Create</a>
    <a href="/rental/export-csv.php?table=transaksi_sewa" class="small button">Export to CSV</a>
  <table>
      <thead>
          <tr>
		      <th>No Transaksi Sewa</th>
		      <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali </th>
		      <th>Sopir</th>
		      <th>Kendaraan</th>
		      <th>Pelanggan</th>
		      <th>Karyawan</th>
		      <th>Aksi</th>
	      </tr>
    </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('transaksisewa', 'transaksisewa.id, transaksisewa.no,transaksisewa.tglpinjam, 
                 transaksisewa.tgl_kembali_realisasi,transaksisewa.sopir_id, transaksisewa.kendaraan_id, transaksisewa.pelanggan_id, transaksisewa.karyawan_id,sopir.nama as sopir,kendaraan.no_plat as kendaraan,pelanggan.nama as pelanggan,karyawan.nama as karyawan',
                 'sopir ON sopir.id = transaksisewa.sopir_id',
                 'kendaraan ON kendaraan.id = transaksisewa.kendaraan_id',
                 'pelanggan ON pelanggan.id = transaksisewa.pelanggan_id',
                 'karyawan ON karyawan.id = transaksisewa.karyawan_id'
                );
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['no'] ?></td>
              <td><?php echo $r['tglpinjam'] ?></td>
              <td><?php echo $r['tgl_kembali_realisasi'] ?></td>
              <td><?php echo $r['sopir'] ?></td>
              <td><?php echo $r['kendaraan'] ?></td>
              <td><?php echo $r['pelanggan'] ?></td>
              <td><?php echo $r['karyawan'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=transaksi-sewa-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=transaksi-sewa-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=transaksi-sewa-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>
</div>
</div>