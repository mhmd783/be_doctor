<?php
include '../connect_dp/database.php';

// $dataregister = file_get_contents("php://input");
// $dataregister = json_decode($dataregister);

if (isset($_GET['name']) &&isset($_GET['phone']) && isset($_GET['pass'])&& isset($_GET['age'])&& isset($_GET['gender']) && !empty($_GET['name']) && !empty($_GET['phone']) && !empty($_GET['pass'])&& !empty($_GET['age']) && !empty($_GET['gender']) ) {
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $pass = $_GET['pass'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];
    
    

    $get = $database->prepare("SELECT * FROM `pationt` WHERE `phone` = :phone ");
    $get->bindParam(":phone", $phone);
    
    $get->execute();
    if($get->rowCount()>0){

        $message = ['mes' => 'not'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
        
    }else{
        
        $insertregister = $database->prepare('INSERT INTO `pationt` (`name`, `phone`, `pass`, `age`, `gender`) VALUES(:username, :phone, :pass, :age, :gender)');
        $insertregister->bindParam("username", $name);
        $insertregister->bindParam("phone", $phone);
        $insertregister->bindParam("pass", $pass);
        $insertregister->bindParam("age", $age);
        $insertregister->bindParam("gender", $gender);

        $insertregister->execute();


        $message = ['mes' => 'good'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
}



?>
