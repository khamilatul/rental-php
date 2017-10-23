<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('pelanggan',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /rental/index.php?module=pelanggan');

}else{

echo "Upss Something wrong..";

}

?>