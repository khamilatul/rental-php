<h2> Status Mobil Pinjaman </h2>

<div class="grid-container">
<table>
      <thead>
          <tr>
		      <th>No Transaksi Sewa</th>
		      <th>Tanggal Pesan</th>
              <th>Tanggal Pinjam </th>
              <th>NO Plat Kendaraan </th>
              <th>Nama Pelanggan </th>
		      <th>Gambar</th>
              <th>Aksi</th>
	      </tr>
    </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('transaksisewa', 'transaksisewa.id, transaksisewa.no,transaksisewa.tglpinjam,transaksisewa.tglpesan,transaksisewa.kendaraan_id,transaksisewa.pelanggan_id,
                 transaksisewa.tgl_kembali_realisasi,transaksisewa.sopir_id, transaksisewa.kendaraan_id, transaksisewa.pelanggan_id, transaksisewa.karyawan_id,sopir.nama as sopir,kendaraan.no_plat as kendaraan,pelanggan.nama as pelanggan,karyawan.nama as karyawan, kendaraan.image as image',
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
              <td><img src="<?php echo $r['image'] ?>" width="200px" height="200px" /></td>
             <td> <div class="small button-group">
                      <a href="?module=rental-pelanggan-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
              </div></td>
          </tr>
<?php
                }
            }
            ?>
</table>
</div>   