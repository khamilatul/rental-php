<?php
require_once('database.php');
$db=new Database();
$db->delete('pelanggan',"id={$_GET['id']}");
$res =$db->getResult();

  if($res){
  header('location: index.php');
 }else{
  echo "Upss Something wrong..";
 }

?>