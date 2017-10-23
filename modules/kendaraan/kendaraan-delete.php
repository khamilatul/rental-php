<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('kendaraan',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /rental/index.php?module=kendaraan');

}else{

echo "Upss Something wrong..";

}

?>