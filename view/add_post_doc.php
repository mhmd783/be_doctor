<?php
include '../connect_dp/database.php';

// $dataregister = file_get_contents("php://input");
// $dataregister = json_decode($dataregister);
//addpost

if (isset($_GET['id_doctor']) &&isset($_GET['f_name']) && isset($_GET['s_name'])&& isset($_GET['post'])&& !empty($_GET['id_doctor']) && !empty($_GET['f_name']) && !empty($_GET['s_name'])&& !empty($_GET['post']) ) {
    $id_doctor = $_GET['id_doctor'];
    $f_name = $_GET['f_name'];
    $s_name = $_GET['s_name'];
    $post = $_GET['post'];
    $like='0';
    
    $insertpost = $database->prepare('INSERT INTO `post_doctor` (`id_doctor`, `f_name`, `s_name`, `post`, `like` ) VALUES(:id_doctor, :f_name, :s_name, :post, :like )');
    $insertpost->bindParam("id_doctor", $id_doctor);
    $insertpost->bindParam("f_name", $f_name);
    $insertpost->bindParam("s_name", $s_name);
    $insertpost->bindParam("post", $post);
    $insertpost->bindParam("like", $like);
    $insertpost->execute();


    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}
//get my postes
use function PHPSTORM_META\map;

//get my posts

if (isset($_GET['id_doctor']) && isset($_GET['get']) && !empty($_GET['id_doctor']) && !empty($_GET['get'])) {
    $id_doctor = $_GET['id_doctor'];
    

    $get = $database->prepare("SELECT * FROM `post_doctor` WHERE `id_doctor` = :id_doctor ORDER BY `id` DESC");
    $get->bindParam(":id_doctor", $id_doctor);
    
    $get->execute();
    if($get->rowCount()>0){
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }
    
    

} 

if (isset($_GET['id_doctor'])  && !empty($_GET['id_post']) ) {
    $id_doctor = $_GET['id_doctor'];
    $id_post = $_GET['id_post'];

    $delete = $database->prepare("DELETE FROM `post_doctor` WHERE `id_doctor` = :id_doctor AND `id`=:id_post");
    $delete->bindParam(":id_doctor", $id_doctor);
    $delete->bindParam(":id_post", $id_post);
    $delete->execute();
    
    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
    

}


?>
