<?php
include '../connect_dp/database.php';


//addlike
//id_doctor_post
if (isset($_GET['id_pationt']) &&isset($_GET['id_post'])   && !empty($_GET['id_pationt']) && !empty($_GET['id_post']) ) {
    $id_pationt = $_GET['id_pationt'];
    $id_post = $_GET['id_post'];
    $id_doctor_post=$_GET['id_doctor_post'];
    //check you like or not
    $get = $database->prepare("SELECT * FROM `like` WHERE `id_pationt` = :id_pationt AND `id_post` = :id_post");
    $get->bindParam("id_pationt", $id_pationt);
    $get->bindParam("id_post", $id_post);
    $get->execute();
    if($get->rowCount()>0) {
        //if you like delete this
        $delete = $database->prepare("DELETE FROM `like` WHERE `id_pationt` = :id_pationt AND `id_post`=:id_post");
        $delete->bindParam("id_pationt", $id_pationt);
        $delete->bindParam("id_post", $id_post);
        $delete->execute();
        $message = ['mes' => 'goodnot'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }else{
        //if not like add like
        $insertpost = $database->prepare('INSERT INTO `like` (`id_pationt`, `id_post` ,`id_doctor`) VALUES(:id_pationt, :id_post ,:id_doctor )');
        $insertpost->bindParam("id_pationt", $id_pationt);
        $insertpost->bindParam("id_post", $id_post);
        $insertpost->bindParam("id_doctor", $id_doctor_post);
        $insertpost->execute();
        $message = ['mes' => 'good'];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);

    }
    
    
    
    
}
//likes home ALL posts 
if (isset($_GET['id_pationtme'])  && !empty($_GET['id_pationtme'])  ) {
    $id_pationt = $_GET['id_pationtme'];
    $get = $database->prepare("SELECT * FROM `like` WHERE `id_pationt` = :id_pationt ");
    $get->bindParam("id_pationt", $id_pationt);
    
    $get->execute();
    
    $result = $get->fetchAll(PDO::FETCH_ASSOC);
    $result = json_encode($result);
    print_r($result);
}
//likes profile visit 
if (isset($_GET['id_pationtmevisit'])  && !empty($_GET['id_pationtmevisit']) &&isset($_GET['id_doctor'])  && !empty($_GET['id_doctor'])  ) {
    $id_pationt = $_GET['id_pationtmevisit'];
    $id_doctor=$_GET['id_doctor'];
    $get = $database->prepare("SELECT * FROM `like` WHERE `id_pationt` = :id_pationt AND `id_doctor` = :id_doctor");
    $get->bindParam("id_pationt", $id_pationt);
    $get->bindParam("id_doctor", $id_doctor);
    $get->execute();
    
    $result = $get->fetchAll(PDO::FETCH_ASSOC);
    $result = json_encode($result);
    print_r($result);
}
?>