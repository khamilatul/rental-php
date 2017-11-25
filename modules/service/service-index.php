<div class="grid-container">
<nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Service</li>
  </ul>
</nav>
<div class="grid-x grid-margin-x">
<a href="?module=service-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <!-- <th>No</th> -->
              <th>Kode Service</th>
		      <th>Tanggal Service</th>
		      <th>Biaya Service</th>
		      <th>ID Kendaraan</th>
              <th>ID Jenis Service</th>
		      <th>Aksi</th>
	      </tr>
      </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('service', 
    'service.id, service.kode_service, service.tgl, service.biaya,service.kendaraan_id, kendaraan.no_plat, jenis_service.nama as jenis_service',
    'kendaraan ON kendaraan.id=service.kendaraan_id',
    'jenis_service ON jenis_service.id=service.jenis_service_id'
);
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['kode_service'] ?></td>
              <td><?php echo $r['tgl'] ?></td>
              <td><?php echo $r['biaya'] ?></td>
              <td><?php echo $r['no_plat'] ?></td>
              <td><?php echo $r['jenis_service'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=service-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=service-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=service-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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