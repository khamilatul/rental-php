<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('transaksisewa',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /rental/index.php?module=rental-pelanggan');

}else{

echo "Upss Something wrong..";

}

?>