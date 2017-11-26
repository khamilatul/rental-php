<div class="grid-container">
<nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
<ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Setoran</li>
  </ul>
</nav>
<div class="grid-x grid-margin-x">
    <a href="?module=setoran-create" class="small button">Create</a>
	
<table>
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>Tanggal Setoran</th>
            <th>Jumlah Setoran</th>
            <th>ID Pemilik</th>
            <th>ID Karyawan</th>
            <th>Aksi</th>
        </tr>
    </thead>
<?php
    require_once("database.php");
    $db=new Database();
    $db->select('setoran', 
    'setoran.id, setoran.tgl, setoran.jumlah, setoran.pemilik_id,pemilik.nama, setoran.karyawan_id,karyawan.nama as karyawan',
    'pemilik ON pemilik.id=setoran.pemilik_id',
    'karyawan ON karyawan.id=setoran.karyawan_id'
);
    $res=$db->getResult();
    // print_r($res);
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['tgl'] ?></td>
              <td><?php echo $r['jumlah'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['karyawan'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=setoran-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=setoran-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=setoran-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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