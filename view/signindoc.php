<?php

use function PHPSTORM_META\map;

include '../connect_dp/database.php';

if (isset($_GET['phone']) && isset($_GET['pass']) && !empty($_GET['phone']) && !empty($_GET['pass'])) {
    $phone = $_GET['phone'];
    $pass = $_GET['pass'];

    $get = $database->prepare("SELECT * FROM `doctor` WHERE `phone` = :phone AND `pass` = :pass");
    $get->bindParam(":phone", $phone);
    $get->bindParam(":pass", $pass);
    $get->execute();
    if($get->rowCount()>0){
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }else{
        $message = ['mes' => 'not'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
    

} 
if (isset($_GET['id']) && !empty($_GET['id']) ) {
    $id = $_GET['id'];
    

    $get = $database->prepare("SELECT * FROM `doctor` WHERE `id` = :id ");
    $get->bindParam(":id", $id);
    $get->execute();
    if($get->rowCount()>0){
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }else{
        $message = ['mes' => 'not'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
    

} 


?>