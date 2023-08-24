<?php
    include '../connect_dp/database.php';
    
if (isset($_GET['id'])  && !empty($_GET['id'])) {
    $id_poststart = $_GET['id'];
    if($id_poststart==1) {
        $get = $database->prepare("SELECT MAX(id) FROM `post_doctor`");
        $get->execute();
        $result=$get->fetch();
        $id_poststart=$result['0']+1;
        


    }

    $id_postend = $id_poststart-7;

    $get = $database->prepare("SELECT * FROM `post_doctor`WHERE `id`<:id AND `id`>=:ide ORDER BY `id` DESC");
    $get->bindParam(":id", $id_poststart);
    $get->bindParam(":ide", $id_postend);
    $get->execute();
    if($get->rowCount()>0) {
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }
    //echo $id_poststart;
}

?>