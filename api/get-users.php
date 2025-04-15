<?php
    include "../config/database.php";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $conn = DatabaseManager::getInstance()->getConnection();
            $sql = "SELECT * FROM user WHERE id = '$id'";
            $result = $conn->query($sql);
            $data = array();
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }

            echo json_encode(array(
               'status' => true,
               'data' => $data,
               'message' => 'Load Successfully'
            ));
        } else {
            $conn = DatabaseManager::getInstance()->getConnection();
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
            $data = array();
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }

            echo json_encode(array(
                'status' => true,
                'data' => $data,
                'message' => 'Load Successfully'
            ));
        }
    } else{
        echo json_encode(array(
            'status' => false,
            'message' => 'Method is not allowed'
        ));
    }

?>