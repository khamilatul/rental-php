<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Transaksi Sewa</li>
  </ul>
</nav>
<a href="?module=transaksi-sewa-create" class="small button">Create</a>
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
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('transaksisewa', 'id, no, tglpesan, tglpinjam, tgl_kembali_rencana, jam_kembali_rencana, 
                 tgl_kembali_realisasi, jam_kembali_realisasi, denda, kilometer_pinjam,kilometer_kembali,
                 BBM_pinjam, BBM_kembali, kondisi_mobil_pinjam, kondisi_mobil_kembali, kerusakan, biaya_kerusakan,
                 biaya_BBM, sopir_id, kendaraan_id, pelanggan_id, karyawan_id');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['no'] ?></td>
              <td><?php echo $r['tglpinjam'] ?></td>
              <td><?php echo $r['tgl_kembali_realisasi'] ?></td>
              <td><?php echo $r['sopir_id'] ?></td>
              <td><?php echo $r['kendaraan_id'] ?></td>
              <td><?php echo $r['pelanggan_id'] ?></td>
              <td><?php echo $r['karyawan_id'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=transaksi-sewa-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=transaksi-sewa-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=transaksi-sewa-delete?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>