<?php

use function PHPSTORM_META\map;

include '../connect_dp/database.php';
//id_doctor=${idbox.get('id')}&start_time=${timestartnew}&end_time=${timeendnew}&day=${day}
if (isset($_GET['id_doctor']) && isset($_GET['start_time']) &&isset($_GET['end_time']) && isset($_GET['day'])&&$_GET['day']!='' ) {
    $id_doctor = $_GET['id_doctor'];
    $start_time = $_GET['start_time'];
    $end_time = $_GET['end_time'];
    $day = $_GET['day'];


    $get = $database->prepare("SELECT * FROM `work_time` WHERE `day` = :day AND `id_doctor`=:id_doctor" );
    $get->bindParam(":day", $day);
    $get->bindParam(":id_doctor", $id_doctor);
    $get->execute();
    if($get->rowCount()>0){
        $message = ['mes' => 'not'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }else{
        $insertregister = $database->prepare('INSERT INTO `work_time` (`id_doctor`, `start_time`, `end_time`, `day`) VALUES(:id_doctor, :start_time, :end_time, :day)');
        $insertregister->bindParam("id_doctor", $id_doctor);
        $insertregister->bindParam("start_time", $start_time);
        $insertregister->bindParam("end_time", $end_time);
        $insertregister->bindParam("day", $day);
        $insertregister->execute();

        $message = ['mes' => 'good'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
    

} 


?>