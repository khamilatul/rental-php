<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('sopir',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /rental/index.php?module=sopir');

}else{

echo "Upss Something wrong..";

}

?>