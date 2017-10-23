<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('jenis_service',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /rental/index.php?module=jenis-service');

}else{
echo "Upss Something wrong..";

}

?>