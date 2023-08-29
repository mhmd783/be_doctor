<?php
include '../connect_dp/database.php';
//get number of doctors  
if($_GET['get']=='getnumberdoctor'){
    $specialty=$_GET['specialty'];
    $city=$_GET['city'];

    if($specialty==''&&$city==''){
        $get = $database->prepare("SELECT * FROM `doctor` ");
        $get->execute();
        
        $message = ['mes' => $get->rowCount()];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
    if($specialty!=''&&$city!=''){
        $get = $database->prepare("SELECT * FROM `doctor` WHERE `specialty`=:specialty AND `city`=:city");
        $get->bindParam(":specialty", $specialty);
        $get->bindParam(":city", $city);
        $get->execute();
        
        $message = ['mes' => $get->rowCount()];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
    if($specialty!=''&&$city==''){
        $get = $database->prepare("SELECT * FROM `doctor` WHERE `specialty`=:specialty ");
        $get->bindParam(":specialty", $specialty);
        $get->execute();
        
        $message = ['mes' => $get->rowCount()];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
    if($specialty==''&&$city!=''){
        $get = $database->prepare("SELECT * FROM `doctor` WHERE `city`=:city");
        $get->bindParam(":city", $city);
        $get->execute();
        
        $message = ['mes' => $get->rowCount()];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
    

    // $get = $database->prepare("SELECT * FROM `doctor`");
    // $get->execute();
    
    // $message = ['mes' => $get->rowCount()];
    // $result = [$message];
    // $result = json_encode($result);
    // print_r($result);
    
}
//get number doctor active
if($_GET['get']=='getnumberdoctoractive'){
    $active=1;
    $get = $database->prepare("SELECT * FROM `doctor` WHERE `active` >= :active");
    $get->bindParam(":active", $active);
    $get->execute();
    
    $message = ['mes' => $get->rowCount()];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}
//get number doctor not active 
if($_GET['get']=='getnumberdoctornotactive'){
    $active=0;
    $get = $database->prepare("SELECT * FROM `doctor` WHERE `active` = :active");
    $get->bindParam(":active", $active);
    $get->execute();
    
    $message = ['mes' => $get->rowCount()];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}

//get number pationt
if($_GET['get']=='getnumberpationt'){
    $get = $database->prepare("SELECT * FROM `pationt`");
    $get->execute();
    
    $message = ['mes' => $get->rowCount()];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}
?>