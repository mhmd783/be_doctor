<?php
    include '../connect_dp/database.php';
    
if (isset($_GET['id'])  && !empty($_GET['id'])) {   
    $id_poststart = $_GET['id'];
    if($id_poststart==1) {
        $get = $database->prepare("SELECT MAX(id) FROM `post_pationt`");
        $get->execute();
        $result=$get->fetch();
        $id_poststart=$result['0']+1;
        


    }

    $id_postend = $id_poststart-2;

    $get = $database->prepare("SELECT * FROM `post_pationt`WHERE `id`<:id AND `id`>=:ide ORDER BY `id` DESC");
    $get->bindParam(":id", $id_poststart);
    $get->bindParam(":ide", $id_postend);
    $get->execute();
    if($get->rowCount()>0) {
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }
    
}
//get post notification
if (isset($_GET['idnot'])  && !empty($_GET['idnot'])) {   
    $id_post = $_GET['idnot'];
   

    $get = $database->prepare("SELECT * FROM `post_pationt`WHERE `id`=:id  ORDER BY `id` DESC");
    $get->bindParam(":id", $id_post);
    $get->execute();
    if($get->rowCount()>0) {
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }
    
}

?>