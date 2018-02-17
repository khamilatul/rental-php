<h2> HOME </h2>

<div class="grid-container">
<div class="grid-x grid-padding-x">
  <div class="small-6 cell">
      <form action="" method="get">
    <input type="text" name="q" placeholder="Cari berdasarkan nama...">
</form>
  </div>
</div>
<?php

    require_once("database.php");
    $search = empty($_GET['q']) ? '' : $_GET['q'];
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
"kendaraan.status_rental='Ada'",
"type.nama LIKE '$search%'"
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
                    <p>Sewa mobil Starlet,Brio,Avanza dll gratis ongkos sopir.
                       <br>Harga mulai 300 ribu/hari. 
                       <br>Hub:ABC Rent Car di Jl.Cuka 12B Kepanjen Malang.
                       <br>Telp: 021-34576</p>
                </div>
            </div>
<?php
                }
            }
            ?>
</div>   