<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Kendaraan</li>
  </ul>
</nav>
<a href="?module=kendaraan-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No Plat</th>
              <th>Tahun</th>
		      <th>Tarif Perjam </th>
		      <th>Status Rental</th>
		      <th>Type id</th>
		      <th>Aksi</th>
	      </tr>
        </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('kendaraan', 'kendaraan.id, kendaraan.no_plat, kendaraan.tahun , kendaraan.tarif_perjam, kendaraan.status_rental, type.nama','type ON type.id=kendaraan.type_id');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['no_plat'] ?></td>
              <td><?php echo $r['tahun'] ?></td>
              <td><?php echo $r['tarif_perjam'] ?></td>
              <td><?php echo $r['status_rental'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=kendaraan-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=kendaraan-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=kendaraan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>