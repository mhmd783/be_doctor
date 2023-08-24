<?php
include '../connect_dp/database.php';


//addcomment
//"http://$ip/doctor/view/comment.php?id_doctor=${idbox.get('id')}&f_name=${f_namebox.get('f_name')}&s_name=${s_namebox.get('s_name')}&id_post=$idquistion&comment=$comment"
if (isset($_GET['id_doctor']) &&isset($_GET['id_pationt']) &&isset($_GET['f_name']) && isset($_GET['s_name'])&& isset($_GET['id_post'])&& isset($_GET['comment'])&& !empty($_GET['id_doctor']) && !empty($_GET['f_name']) && !empty($_GET['s_name'])&& !empty($_GET['id_post']) && !empty($_GET['comment'])) {
    $id_doctor = $_GET['id_doctor'];
    $id_pationt=$_GET['id_pationt'];
    $f_name = $_GET['f_name'];
    $s_name = $_GET['s_name'];
    $id_post = $_GET['id_post'];
    $comment=$_GET['comment'];
    
    $insertpost = $database->prepare('INSERT INTO `comment` (`id_doctor`, `id_pationt`, `f_name`, `s_name`, `id_post`, `comment` ) VALUES(:id_doctor, :id_pationt, :f_name, :s_name, :id_post, :comment )');
    $insertpost->bindParam("id_doctor", $id_doctor);
    $insertpost->bindParam("id_pationt", $id_pationt);
    $insertpost->bindParam("f_name", $f_name);
    $insertpost->bindParam("s_name", $s_name);
    $insertpost->bindParam("id_post", $id_post);
    $insertpost->bindParam("comment", $comment);
    $insertpost->execute();


    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}

//get comment post by id post
if (isset($_GET['id_posts'])  && !empty($_GET['id_posts'])) {
    $id_post = $_GET['id_posts'];
    $get = $database->prepare("SELECT * FROM `comment` WHERE `id_post`=:id ");
    $get->bindParam(":id", $id_post);
    $get->execute();
    if($get->rowCount()>0) {
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }   
    //echo $id_poststart;
}
//get comment pationt 
if (isset($_GET['id_pat'])  && !empty($_GET['id_pat'])) {
    $id_pationt = $_GET['id_pat'];
    $get = $database->prepare("SELECT * FROM `comment` WHERE `id_pationt`=:id ORDER BY `id` DESC");
    $get->bindParam(":id", $id_pationt);
    $get->execute();
    if($get->rowCount()>0) {
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }   
    //echo $id_poststart;
}
//number comment 
if(isset($_GET['id_pationt_number_comment'])){
    

    $id_doctor = $_GET['id_pationt_number_comment'];
    $dateregister=date('Y-m-d');
    
    $get = $database->prepare("SELECT * FROM `comment` WHERE `id_pationt`=:id_pationt  ORDER BY `id` DESC");
    $get->bindParam(":id_pationt", $id_doctor);
    $get->execute();
    if($get->rowCount()>0) {
        $message = ['mes' => $get->rowCount()];
        $result = [$message];
        $result = json_encode($result);
        print_r($result);
    }
}
?>