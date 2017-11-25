<div class="grid-container">
 <nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Merk</li>
  </ul>
</nav>
<div class="grid-x grid-margin-x">
<a href="?module=merk-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <!-- <th>No</th> -->
		      <th>Kode Merk</th>
		      <th>Nama Merk</th>
		      <th>Aksi</th>
	      </tr>
     </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('merk', 'id, kode_merk, nama');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <!-- <td><?php echo $r['id'] ?></td> -->
              <td><?php echo $r['kode_merk'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=merk-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=merk-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=merk-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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