<?php

    include "../config/database.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['phone'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];

            $conn = DatabaseManager::getInstance()->getConnection();
            $sql = "UPDATE `user` 
            SET `name` = '$name', `age` = '$age', `phone` = '$phone'
            WHERE `id` = '$id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_affected_rows($conn)){
                echo json_encode(array(
                    "status" => true,
                    "message" => "Update Successfully"
                ));
            } else{
                echo json_encode(array(
                    "status" => false,
                    "message" => "Update Failed"
                ));
            }
        } else{
            echo json_encode(array(
                "status" => false,
                "message" => "Parameter is not valid"
            ));
        }
    } else {
        echo json_encode(array(
            "status" => false,
            "message" => "Method is not allowed"
        ));
    }

?>