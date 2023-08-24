<?php

use function PHPSTORM_META\map;

include '../connect_dp/database.php';
//add rating
if (isset($_GET['id_doctor']) &&isset($_GET['id_pationt'])&&isset($_GET['add']) ) {
    $id_doctor = $_GET['id_doctor'];
    $id_pationt = $_GET['id_pationt'];
    
    $rating=1;
    
    $insertpost = $database->prepare('INSERT INTO `ratings` (`id_doctor`, `id_pationt`, `rating` ) VALUES(:id_doctor, :id_pationt, :rating)');
    $insertpost->bindParam("id_doctor", $id_doctor);
    $insertpost->bindParam("id_pationt", $id_pationt);
    $insertpost->bindParam("rating", $rating);
    $insertpost->execute();

    $get = $database->prepare("SELECT * FROM `doctor` WHERE `id` = :id ");
    $get->bindParam(":id", $id_doctor);
    $get->execute();
    foreach($get as $row){
        $newrating=$row['rating']+1;
    }
    $id_doctor=intval($id_doctor);

    $update = $database->prepare('UPDATE `doctor` SET `rating`=:rating WHERE `id`=:id');
    $update->bindParam("rating", $newrating);
    $update->bindParam("id", $id_doctor);
    $update->execute();

    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}
//////get i rating
if (isset($_GET['id_pationt']) && isset($_GET['id_pationt'])&&!empty($_GET['get']) ) {
    $id = $_GET['id_pationt'];
    $id_doctor=$_GET['id_doctor'];

    $get = $database->prepare("SELECT * FROM `ratings` WHERE `id_pationt` = :id AND `id_doctor`=:id_doctor");
    $get->bindParam(":id", $id);
    $get->bindParam(":id_doctor", $id_doctor);
    $get->execute();
    if($get->rowCount()>0){
        $message = ['mes' => 'good'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }else{
        $message = ['mes' => 'not'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
}

// if (isset($_GET['id_pationt']) && !empty($_GET['get']) ) {
//     $id = $_GET['id'];
    

//     $get = $database->prepare("SELECT * FROM `doctor` WHERE `id` = :id ");
//     $get->bindParam(":id", $id);
//     $get->execute();
//     if($get->rowCount()>0){
//         $result = $get->fetchAll(PDO::FETCH_ASSOC);
//         $result = json_encode($result);
//         print_r($result);
//     }else{
//         $message = ['mes' => 'not'];
//         $result = [$message];
//         $result = json_encode($result);
//         print_r($result);
//     }
// } 


?>