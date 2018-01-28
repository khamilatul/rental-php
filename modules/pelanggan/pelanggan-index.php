<div class="grid-container">
    <nav aria-label="You are here:" role="navigation" style="margin-top: 20px;">
        <ul class="breadcrumbs">
            <li><a href="?module=pelanggan">Home</a></li>
            <li class="disabled">Data Pelanggan</li>
        </ul>
    </nav>
      <div class="grid-x grid-margin-x">
        <form class="form-horizontal" action="/rental/import-csv.php?table=pelanggan" method="post" name="upload_excel" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="file" name="file" id="file" class="input-large">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="Import" class="small button" data-loading-text="Loading...">Import</button>
                    </div>
                </div>
            </fieldset>
        </form>
      </div>
      <div class="grid-x grid-margin-x">
        <a href="?module=pelanggan-create" class="small button">Create</a>
        <a href="/rental/export-csv.php?table=pelanggan" class="small button">Export to CSV</a>

  <table>
        <thead>
          <tr>
		      <th>No Pelanggan</th>
		      <th>Nomor KTP </th>
		      <th>Nama Pelanggan</th>
		      <th>Alamat Pelanggan</th>
		      <th>Nomor Telepon</th>
		      <th>Aksi</th>
	      </tr>
        </thead>
    <?php
    require_once("database.php");
    $db=new Database();
    $db->select('pelanggan', 'id,nip,no_ktp, nama, alamat, telp');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['nip'] ?></td>
              <td><?php echo $r['no_ktp'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['alamat'] ?></td>
              <td><?php echo $r['telp'] ?></td>

              <td>
                  <div class="small button-group">
                      <a href="?module=pelanggan-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=pelanggan-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=pelanggan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
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