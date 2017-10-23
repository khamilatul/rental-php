<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Karyawan</li>
  </ul>
</nav>
<a href="?module=karyawan-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No</th>
              <th>NIK </th>
		      <th>Nama Karyawan </th>
		      <th>Alamat Karyawan</th>
		      <th>No Telepon</th>
		      <th>Aksi</th>
	      </tr>
        </thead>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('karyawan', 'id, nik, nama, alamat, telp');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['id'] ?></td>
              <td><?php echo $r['nik'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['alamat'] ?></td>
              <td><?php echo $r['telp'] ?></td>

              <td>
                  <div class="small button-group">
                      <a href="?module=karyawan-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=karyawan-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=karyawan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>