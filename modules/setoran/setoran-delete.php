<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('setoran',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /rental/index.php?module=setoran');

}else{

echo "Upss Something wrong..";

}

?>