<h2> HOME </h2>

<div class="grid-container">
<?php
    require_once("database.php");
    $db=new Database();
    $db->select('kendaraan', 
'kendaraan.id,
kendaraan.image, 
kendaraan.no_plat, 
kendaraan.tahun , 
kendaraan.tarif_perjam,
kendaraan.status_rental, 
type.nama','type ON type.id=kendaraan.type_id',
'',
'',
'',
"kendaraan.status_rental='Ada'"
);
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <div class="media-object stack-for-small">
                <div class="media-object-section">
                    <div class="thumbnail">
                    <a href="?module=kendaraan-show&id=<?php echo $r['id'] ?>">
                    <img src="<?php echo $r['image'] ?>" width="200px" height="200px" />
                    </a>
                    </div>
                </div>
                <div class="media-object-section">
                    <h4><?php echo $r['nama'] ?></h4>
                    <p>Shrink the browser width to see me stack. I do tricks for dog treats, but I'm not a dog.</p>
                </div>
            </div>
<?php
                }
            }
            ?>
</div>   