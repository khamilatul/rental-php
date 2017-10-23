<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Sopir</li>
  </ul>
</nav>
<a href="?module=sopir-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No</th>
		      <th>Nama</th>
		      <th>Alamat</th>
		      <th>Telepon</th>
		      <th>NO SIM</th>
		      <th>Tarif Perjam</th>
		      <th>Aksi</th>
	      </tr>
    </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('sopir', 'id, nama, alamat, telp, no_sim, tarif_perjam');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['id'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['alamat'] ?></td>
              <td><?php echo $r['telp'] ?></td>
              <td><?php echo $r['no_sim'] ?></td>
              <td><?php echo $r['tarif_perjam'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=sopir-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=sopir-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=sopir-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>