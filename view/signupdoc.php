<?php
include '../connect_dp/database.php';


if (isset($_GET['f_name']) &&isset($_GET['s_name']) &&isset($_GET['description']) &&isset($_GET['salary']) &&isset($_GET['specialty']) &&isset($_GET['phone']) &&isset($_GET['email']) &&isset($_GET['pass']) &&isset($_GET['age']) &&isset($_GET['gender']) &&isset($_GET['city']) &&isset($_GET['area']) &&isset($_GET['streat']) &&isset($_GET['build_num'])) {
    $get = $database->prepare("SELECT * FROM `doctor` WHERE `phone` = :phone ");
    $get->bindParam(":phone", $_GET['phone']);
    
    $get->execute();
    if($get->rowCount()>0){

        $message = ['mes' => 'not'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
        
    }else{
        $rating=0;
        $active=1;
        
        
        $insertregister = $database->prepare('INSERT INTO `doctor` (`f_name`, `s_name`, `description`, `specialty`, `phone`, `email`, `pass`, `age`, `gender`, `city`, `area`, `streat`, `number_build`, `salary`, `rating` ,`active`) 
        VALUES(:f_name,:s_name,:description,:specialty,:phone,:email,:pass,:age,:gender,:city,:area,:streat,:number_build,:salary,:rating,:active)');
        $insertregister->bindParam("f_name", $_GET['f_name']);
        $insertregister->bindParam("s_name", $_GET['s_name']);
        $insertregister->bindParam("description", $_GET['description']);
        $insertregister->bindParam("specialty", $_GET['specialty']);
        $insertregister->bindParam("phone", $_GET['phone']);
        $insertregister->bindParam("email", $_GET['email']);
        $insertregister->bindParam("pass", $_GET['pass']);
        $insertregister->bindParam("age", $_GET['age']);
        $insertregister->bindParam("gender", $_GET['gender']);
        $insertregister->bindParam("city", $_GET['city']);
        $insertregister->bindParam("area", $_GET['area']);
        $insertregister->bindParam("streat", $_GET['streat']);
        $insertregister->bindParam("number_build", $_GET['build_num']);
        $insertregister->bindParam("salary", $_GET['salary']);
        $insertregister->bindParam("rating", $rating);
        $insertregister->bindParam("active", $active);
        $insertregister->execute();


        $message = ['mes' => 'good'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
}

if (isset($_GET['id']) &&isset($_GET['f_name']) &&isset($_GET['s_name']) &&isset($_GET['description']) &&isset($_GET['salary']) &&isset($_GET['specialty']) &&isset($_GET['email']) &&isset($_GET['age']) &&isset($_GET['city']) &&isset($_GET['area']) &&isset($_GET['streat']) &&isset($_GET['build_num'])) {
        
        
        $insertregister = $database->prepare('UPDATE `doctor` SET `f_name`=:f_name, `s_name`=:s_name, `description`=:description, `specialty`=:specialty,  `email`=:email, `age`=:age, `city`=:city, `area`=:area, `streat`=:streat, `number_build`=:number_build, `salary`=:salary WHERE `id`=:id');
        $insertregister->bindParam("f_name", $_GET['f_name']);
        $insertregister->bindParam("s_name", $_GET['s_name']);
        $insertregister->bindParam("description", $_GET['description']);
        $insertregister->bindParam("specialty", $_GET['specialty']);
        $insertregister->bindParam("email", $_GET['email']);
        $insertregister->bindParam("age", $_GET['age']);
        $insertregister->bindParam("city", $_GET['city']);
        $insertregister->bindParam("area", $_GET['area']);
        $insertregister->bindParam("streat", $_GET['streat']);
        $insertregister->bindParam("number_build", $_GET['build_num']);
        $insertregister->bindParam("salary", $_GET['salary']);
        $insertregister->bindParam("id", $_GET['id']);
        
        //$insertregister->bindParam("rating", $rating);
        $insertregister->execute();


        $message = ['mes' => 'good'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
   // }
}



?>
