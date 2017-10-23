<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Pemilik</li>
  </ul>
</nav>
<a href="?module=pemilik-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No pemilik</th>
		      <th>Kode pemilik</th>
		      <th>Nama pemilik</th>
		      <th>Alamat pemilik</th>
		      <th>Kendaraan ID</th>
		      <th>Aksi</th>
	      </tr>
     </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('pemilik', 'pemilik.id, pemilik.kode, pemilik.nama, pemilik.alamat, pemilik.telp, pemilik.kendaraan_id, kendaraan.no_plat',
                'kendaraan ON kendaraan.id=pemilik.kendaraan_id');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['kode'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['alamat'] ?></td>
              <td><?php echo $r['telp'] ?></td>
              <td><?php echo $r['no_plat'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=pemilik-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=pemilik-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=pemilik-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>