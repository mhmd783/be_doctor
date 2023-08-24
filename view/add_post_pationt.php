<?php
include '../connect_dp/database.php';

// $dataregister = file_get_contents("php://input");
// $dataregister = json_decode($dataregister);
//addpost

if (isset($_GET['id_pationt']) &&isset($_GET['name'])&& isset($_GET['post']) ) {
    $id_pationt = $_GET['id_pationt'];
    $name = $_GET['name'];
    $post = $_GET['post'];
    $comment='0';
    
    $insertpost = $database->prepare('INSERT INTO `post_pationt` (`id_pationt`, `name`, `post`, `comment` ) VALUES(:id_pationt, :name, :post, :comment )');
    $insertpost->bindParam("id_pationt", $id_pationt);
    $insertpost->bindParam("name", $name);
    $insertpost->bindParam("post", $post);
    $insertpost->bindParam("comment", $comment);
    $insertpost->execute();


    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
}
//get my postes
use function PHPSTORM_META\map;

//get my posts

if (isset($_GET['id_pationt']) && isset($_GET['get']) ) {
    $id_pationt = $_GET['id_pationt'];
    

    $get = $database->prepare("SELECT * FROM `post_pationt` WHERE `id_pationt` = :id_pationt ORDER BY `id` DESC");
    $get->bindParam(":id_pationt", $id_pationt);
    
    $get->execute();
    if($get->rowCount()>0){
        $result = $get->fetchAll(PDO::FETCH_ASSOC);
        $result = json_encode($result);
        print_r($result);
    }
    
    

} 

if (isset($_GET['id_pationt'])  && isset($_GET['id_post']) ) {
    $id_pationt = $_GET['id_pationt'];
    $id_post = $_GET['id_post'];

    $delete = $database->prepare("DELETE FROM `post_pationt` WHERE `id_pationt` = :id_pationt AND `id`=:id_post");
    $delete->bindParam(":id_pationt", $id_pationt);
    $delete->bindParam(":id_post", $id_post);
    $delete->execute();
    
    $message = ['mes' => 'good'];
    $result = [$message];
    $result = json_encode($result);
    print_r($result);
    
    

}
?>