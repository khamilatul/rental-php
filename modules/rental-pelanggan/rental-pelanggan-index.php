<div class="grid-container">
<nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
<ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Rental Pelanggan</li>
  </ul>
</nav>
<div class="grid-x grid-margin-x">
<!-- <a href="?module=rental-pelanggan-create" class="small button">Create</a> -->
<a href="/rental/export-csv.php?table=pemilik" class="small button">Export to CSV</a>
  <table>
      <thead>
          <tr>
		      <th>No Transaksi Sewa</th>
		      <th>Tanggal Pesan</th>
              <th>Tanggal Pinjam </th>
              <th>NO Plat Kendaraan </th>
              <th>Nama Pelanggan </th>
		      <th>Aksi</th>
	      </tr>
    </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('transaksisewa', 'transaksisewa.id, transaksisewa.no,transaksisewa.tglpinjam,transaksisewa.tglpesan,transaksisewa.kendaraan_id,transaksisewa.pelanggan_id,
                 transaksisewa.tgl_kembali_realisasi,transaksisewa.sopir_id, transaksisewa.kendaraan_id, transaksisewa.pelanggan_id, transaksisewa.karyawan_id,sopir.nama as sopir,kendaraan.no_plat as kendaraan,pelanggan.nama as pelanggan,karyawan.nama as karyawan',
                 'sopir ON sopir.id = transaksisewa.sopir_id',
                 'kendaraan ON kendaraan.id = transaksisewa.kendaraan_id',
                 'pelanggan ON pelanggan.id = transaksisewa.pelanggan_id',
                 'karyawan ON karyawan.id = transaksisewa.karyawan_id'
                );
    $res=$db->getResult();
    // print_r($res);
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['no'] ?></td>
              <td><?php echo $r['tglpesan'] ?></td>
              <td><?php echo $r['tglpinjam'] ?></td>
              <td><?php echo $r['kendaraan'] ?></td>
              <td><?php echo $r['pelanggan'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=rental-pelanggan-kembali&id=<?php echo $r['id']; ?>" class=" button">Pengembalian</a>
                      <a href="?module=rental-pelanggan-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=rental-pelanggan-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=rental-pelanggan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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