<div class="grid-container">
<nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
         <ul class="breadcrumbs">
            <li><a href="?module=home">Home</a></li>
            <li class="disabled">Data Jenis Service </li>
         </ul>
    </nav>
    <div class="grid-x grid-margin-x">
<a href="?module=jenis-service-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>Nama jenis Service</th>
		      <th>Aksi</th>
	      </tr>
      </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('jenis_service', 'id, kode, nama');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['nama'] ?></td>

              <td>
                  <div class="small button-group">
                      <a href="?module=jenis-service-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=jenis-service-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=jenis-service-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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