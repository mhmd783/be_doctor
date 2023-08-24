<?php

use function PHPSTORM_META\map;

include '../connect_dp/database.php';

if (isset($_GET['id_doctor'])  && !empty($_GET['id_doctor']) ) {
    $id_doctor = $_GET['id_doctor'];
    

    $get = $database->prepare("SELECT * FROM `work_time` WHERE `id_doctor` = :id_doctor");
    $get->bindParam(":id_doctor", $id_doctor);
    $get->execute();
    
    $result = $get->fetchAll(PDO::FETCH_ASSOC);
    $result = json_encode($result);
    print_r($result);
    
    

} 
if (isset($_GET['id_doctordelet'])  && !empty($_GET['id_day']) ) {
    $id_doctor = $_GET['id_doctordelet'];
    $id_day = $_GET['id_day'];

    $delete = $database->prepare("DELETE FROM `work_time` WHERE `id_doctor` = :id_doctor AND `id`=:id_day");
    $delete->bindParam(":id_doctor", $id_doctor);
    $delete->bindParam(":id_day", $id_day);
    $delete->execute();
   // if(){
        $message = ['mes' => 'good'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    // }else{
    //     $message = ['mes' => 'nott'];
    //     $result = [$message];
    //     $result = json_encode($result);
    //     print_r($result);
    // }
    

}


?>