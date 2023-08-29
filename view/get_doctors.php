<?php
include '../connect_dp/database.php';
//&& isset($_GET['specialty'])  &&isset($_GET['city'])
$numberrow=10;

if (isset($_GET['id'])) { 
    
    $id_poststart = $_GET['id'];
    $specialty=$_GET['specialty'];
    $city=$_GET['city'];
    if($specialty!=''&&$city!=''){

        if($id_poststart==1) {
            $get = $database->prepare("SELECT MAX(id) FROM `doctor` WHERE `specialty`=:specialty AND `city`=:city");
            $get->bindParam(":specialty", $specialty);
            $get->bindParam(":city", $city);
            $get->execute();
            $result=$get->fetch();
            $id_poststart=$result['0']+1;
        }
        $id_postend = $id_poststart-$numberrow;

        $get = $database->prepare("SELECT * FROM `doctor`WHERE `id`<:id AND `id`>=:ide AND `specialty`=:specialty AND `city`=:city ORDER BY `rating` DESC");
        $get->bindParam(":id", $id_poststart);
        $get->bindParam(":ide", $id_postend);
        $get->bindParam(":specialty", $specialty);
        $get->bindParam(":city", $city);
        $get->execute();
        if($get->rowCount()>0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }
    }
    if($specialty!=''&&$city==''){

        if($id_poststart==1) {
            $get = $database->prepare("SELECT MAX(id) FROM `doctor` WHERE `specialty`=:specialty");
            $get->bindParam(":specialty", $specialty);
            
            $get->execute();
            $result=$get->fetch();
            $id_poststart=$result['0']+1;
        }
        $id_postend = $id_poststart-$numberrow;

        $get = $database->prepare("SELECT * FROM `doctor`WHERE `id`<:id AND `id`>=:ide AND `specialty`=:specialty ORDER BY `rating` DESC");
        $get->bindParam(":id", $id_poststart);
        $get->bindParam(":ide", $id_postend);
        $get->bindParam(":specialty", $specialty);
        $get->execute();
        if($get->rowCount()>0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }
    }
    if($specialty==''&&$city!=''){

        if($id_poststart==1) {
            $get = $database->prepare("SELECT MAX(id) FROM `doctor` WHERE `city`=:city");
            $get->bindParam(":city", $city);
            $get->execute();
            $result=$get->fetch();
            $id_poststart=$result['0']+1;
        }
        $id_postend = $id_poststart-$numberrow;

        $get = $database->prepare("SELECT * FROM `doctor`WHERE `id`<:id AND `id`>=:ide AND `city`=:city ORDER BY `rating` DESC");
        $get->bindParam(":id", $id_poststart);
        $get->bindParam(":ide", $id_postend);
        $get->bindParam(":city", $city);
        $get->execute();
        if($get->rowCount()>0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }
    }
    if($specialty==''&&$city==''){

        if($id_poststart==1) {
            $get = $database->prepare("SELECT MAX(id) FROM `doctor`");
            
            $get->execute();
            $result=$get->fetch();
            $id_poststart=$result['0']+1;
        }
        $id_postend = $id_poststart-$numberrow;

        $get = $database->prepare("SELECT * FROM `doctor`WHERE `id`<:id AND `id`>=:ide ORDER BY `rating` DESC");
        $get->bindParam(":id", $id_poststart);
        $get->bindParam(":ide", $id_postend);
        $get->execute();
        if($get->rowCount()>0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }
    }
    
    
}

if (isset($_GET['name'])) {

    $characters = str_split($_GET['name']);
    $i=0;
    for($i=0;$i<count($characters);$i++){
        if($characters[$i]==' '){
            break;
        }
    }  // Convert the string into an array of characters
    $f_name = implode(array_slice($characters, 0, $i));  // Join the first half of the characters
    $s_name = implode(array_slice($characters,$i+1)); 

        //SELECT * FROM `doctor` WHERE `f_name` LIKE CONCAT('%',:f_name,'%') OR `s_name` LIKE CONCAT('%',:s_name,'%') ORDER BY id DESC
    
        $get = $database->prepare("SELECT * FROM `doctor` WHERE `f_name` =:f_name OR `s_name` =:s_name ORDER BY id DESC");
        $get->bindParam(":f_name", $f_name);
        $get->bindParam(":s_name", $s_name);
        
        $get->execute();
        if($get->rowCount()>0) {
            $result = $get->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            print_r($result);
        }


}

if(isset($_GET['getcity'])){
    $getcity = $database->prepare("SELECT * FROM `citys` ");
    $getcity->execute();
    $result = $getcity->fetchAll(PDO::FETCH_ASSOC);
    $result = json_encode($result);
    print_r($result);
}
if(isset($_GET['getspcialty'])){
    $getspcialty = $database->prepare("SELECT * FROM `specialties` ");
    $getspcialty->execute();
    $result = $getspcialty->fetchAll(PDO::FETCH_ASSOC);
    $result = json_encode($result);
    print_r($result);
}
?>