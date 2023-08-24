<?php

include '../connect_dp/database.php';

//add pationt

if (isset($_GET['id_pationt']) &&isset($_GET['id_doctor'])&&isset($_GET['name_doctor']) && isset($_GET['namepationt'])&& isset($_GET['phonepationt'])&& isset($_GET['agepationt'])&& isset($_GET['date']) ) {
    $id_pationt = $_GET['id_pationt'];
    $id_doctor = $_GET['id_doctor'];
    $name_doctor=$_GET['name_doctor'];
    $namepationt = $_GET['namepationt'];
    $phonepationt = $_GET['phonepationt'];
    $agepationt=$_GET['agepationt'];
    $dateenter=$_GET['date'];
    $dateregister=date('Y-m-d');
    $send_to_doctor=0;

    $insertpost = $database->prepare('INSERT INTO `reservation` ( `id_pationt`, `id_doctor`,`name_doctor`, `date_register`, `name_pationt`, `phone`, `age`, `date_enter` ,`send_to_doctor`)
    VALUES(:id_pationt,:id_doctor,:name_doctor,:dateregister,:namepationt,:phonepationt,:agepationt,:dateenter ,:send_to_doctor)');
    $insertpost->bindParam("id_pationt", $id_pationt);
    $insertpost->bindParam("id_doctor", $id_doctor);
    $insertpost->bindParam("name_doctor", $name_doctor);
    $insertpost->bindParam("dateregister", $dateregister);
    $insertpost->bindParam("namepationt", $namepationt);
    $insertpost->bindParam("phonepationt", $phonepationt);
    $insertpost->bindParam("agepationt", $agepationt);
    $insertpost->bindParam("dateenter", $dateenter);
    $insertpost->bindParam("send_to_doctor", $send_to_doctor);
    
    $insertpost->execute();


    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}

if(isset($_GET['id_doc'])){
    

    $id_doctor = $_GET['id_doc'];
    
    $get = $database->prepare("SELECT * FROM `reservation` WHERE `id_doctor`=:iddoc  ORDER BY `id` DESC");
    $get->bindParam(":iddoc", $id_doctor);
    $get->execute();
    if($get->rowCount()>0) {
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }
}
if(isset($_GET['id_doct'])){
    

    $id_doctor = $_GET['id_doct'];
    $dateregister=date('Y-m-d');
    
    $get = $database->prepare("SELECT * FROM `reservation`WHERE `id_doctor`=:iddoc AND `date_register`=:date  ORDER BY `id` DESC");
    $get->bindParam(":iddoc", $id_doctor);
    $get->bindParam(":date", $dateregister);
    $get->execute();
    if($get->rowCount()>0) {
        $message = ['mes' => $get->rowCount()];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
}


if(isset($_GET['id_pationt_profile'])){
    

    $id_pationt = $_GET['id_pationt_profile'];
    
    $get = $database->prepare("SELECT * FROM `reservation`WHERE `id_pationt`=:id_pationt ORDER BY `id` DESC");
    $get->bindParam(":id_pationt", $id_pationt);
    $get->execute();
    if($get->rowCount()>0) {
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }
}
//update send pationt 
if (isset($_GET['id_reser'])&&isset($_GET['update'])){
    
    $id=$_GET['id_reser'];
    $update= $database->prepare('UPDATE `reservation` SET `send_to_doctor`=:send WHERE `id`=:id');
    $update->bindValue(":send", 1);
    $update->bindValue(":id", $id);
    $update->execute();
    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}
?>