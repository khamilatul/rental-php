<div class="grid-container">
<nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Type</li>
  </ul>
</nav>
<div class="grid-x grid-margin-x">
    <a href="?module=type-create" class="small button">Create</a>
    <a href="/rental/export-csv.php?table=type" class="small button">Export to CSV</a>
  <table>
      <thead>
          <tr>
		      <!-- <th>ID</th> -->
		      <th>Nama Type</th>
		      <th>Nama merk</th>
		      <th>Aksi</th>
	      </tr>
      </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('type',
     'type.id, type.nama, type.merk_id, merk.nama as merk',
     'merk ON merk.id = type.merk_id'
    );
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <!-- <td><?php echo $r['id'] ?></td> -->
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['merk'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=type-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=type-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=type-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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