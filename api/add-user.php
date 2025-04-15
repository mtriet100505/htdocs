<?php
    include "../config/database.php";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['phone'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];

            $conn = DatabaseManager::getInstance()->getConnection();
            $sql = "INSERT INTO `user` (`name`, `age`, `phone`) VALUES ('$name', '$age', '$phone')";
            $result = mysqli_query($conn, $sql);
            if(mysqli_affected_rows($conn)){
                echo json_encode(array(
                    'status' => true,
                    'message' => 'Add successfully'
                ));
            } else{
                echo json_encode(array(
                    'status' => false,
                    'message' => 'Add failed'
                ));
            }
        } else{
            echo json_encode(array(
                'status' => false,
                'message' => 'Parameter is not valid'
            ));
        }
    } else{
        echo json_encode(array(
            'status' => false,
            'message' => 'Method is not allowed'
        ));
    }

?>