<?php

include '../connect_dp/database.php';

//active acount doctor 
if (isset($_GET['active']) &&isset($_GET['id_doctor'])){
    $id_doctor=$_GET['id_doctor'];
    $active=$_GET['active'];
    $update = $database->prepare('UPDATE `doctor` SET `active`=:active WHERE `id`=:id');
    $update->bindParam("active", $active);
    $update->bindParam("id", $id_doctor);
    $update->execute();


    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);

}
//search doctor by phone number 
if (isset($_GET['phone'])) {

        $phone=$_GET['phone'];

        
        $get = $database->prepare("SELECT * FROM `doctor` WHERE `phone` =:phone");
        $get->bindParam(":phone", $phone);
        
        $get->execute();
        if($get->rowCount()>0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }


}

////git doctors active And not active
$numberrow=10;

if (isset($_GET['id'])&&isset($_GET['active']) ) {
    $id_poststart = $_GET['id'];
    $active=$_GET['active'];
    //active///////////////////////////////////////////////////////////////////
    if($active>0) {
        $active=1;
        if($id_poststart == 1) {
            $get = $database->prepare("SELECT MAX(id) FROM `doctor` WHERE `active`>:active ");
            $get->bindParam(":active", $active);
            $get->execute();
            $result = $get->fetch();
            $id_poststart = $result['0'] + 1;
        }
        $id_postend = $id_poststart - $numberrow;

        $get = $database->prepare("SELECT * FROM `doctor`WHERE `id`<:id AND `id`>=:ide AND `active` >= :active ORDER BY `rating` DESC");
        $get->bindParam(":id", $id_poststart);
        $get->bindParam(":ide", $id_postend);
        $get->bindParam(":active", $active);
        $get->execute();
        if($get->rowCount() > 0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }
    }
    //not active ////////////////////////////
    if($active==0) {
        $active=0;
        if($id_poststart == 1) {
            $get = $database->prepare("SELECT MAX(id) FROM `doctor` WHERE `active`=:active ");
            $get->bindParam(":active", $active);
            $get->execute();
            $result = $get->fetch();
            $id_poststart = $result['0'] + 1;
        }
        $id_postend = $id_poststart - $numberrow;

        $get = $database->prepare("SELECT * FROM `doctor`WHERE `id`<:id AND `id`>=:ide AND `active` = :active ORDER BY `rating` DESC");
        $get->bindParam(":id", $id_poststart);
        $get->bindParam(":ide", $id_postend);
        $get->bindParam(":active", $active);
        $get->execute();
        if($get->rowCount() > 0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }
    }
}



?>