<?php

    include "../config/database.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $conn = DatabaseManager::getInstance()->getConnection();
            $sql = "DELETE FROM `user` WHERE `id`='$id'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_affected_rows($conn) ){
                echo json_encode(
                    array(
                        "status"=> true,
                        "message"=> "Delete successfully!"
                ));
            } else{
                echo json_encode(
                    array(
                        "status"=> false,
                        "message"=> "Delete failed!"
                    ));
            }
        } else{
            echo json_encode(
                array(
                    "status"=> false,
                    "message"=> "Parameter is not valid!"
                ));
        }
    } else{
        echo json_encode(
            array(
                "status"=> false,
                "message"=> "Method is not allowed!"
            ));
    }

?>