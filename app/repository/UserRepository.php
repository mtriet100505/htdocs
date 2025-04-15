<?php

class UserRepository{
    private DatabaseManager $databaseManager;
    private mysqli $conn;
    public function __construct() {
        $this->databaseManager = DatabaseManager::getInstance();
        $this->conn = $this->databaseManager->getConnection();
    }

    public function getUsers(): array{
        $conn = $this->conn;
        $sql = "SELECT `user`.`id` AS `userId`, 
                     `user`.`name`, 
                    `user`.`age`, 
                    `user`.`phone`, 
                    `account`.`email`, 
                    `account`.`role_id`, 
                    `role`.`role_name`
                    FROM `user` 
                join `account` on `user`.`id` = `account`.`user_id`
                join `role` on `account`.`role_id` = `role`.`id` order by `account`.`role_id`";
        $data = array();
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row["userId"];
            $name = $row["name"];
            $age = $row["age"];
            $phone = $row["phone"];
            $email = $row["email"];
            $role_id = $row["role_id"];
            $role_name = $row["role_name"];

            $data[] = new GetUserDto($id, $name, $age, $phone, $email, $role_id, $role_name);
        }
        $this->databaseManager->closeConnection();
        return $data;
    }

    public function getUserByEmail(string $email): GetUserDto
    {
        $conn = $this->conn;
        $sql = "SELECT `user`.`id` AS `userId`, 
                     `user`.`name`, 
                    `user`.`age`, 
                    `user`.`phone`, 
                    `account`.`email`, 
                    `account`.`role_id`, 
                    `role`.`role_name`
                    FROM `user` 
                join `account` on `user`.`id` = `account`.`user_id`
                join `role` on `account`.`role_id` = `role`.`id` 
                where `account`.`email` = ? order by `account`.`role_id`";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
//        var_dump($result);
        $row = $result->fetch_assoc();
        $stmt->close();
        return $result->num_rows === 0 ?
            new GetUserDto(0, "", 0, "", "", -1, "")
            :
            new GetUserDto($row["userId"], $row["name"], $row["age"], $row["phone"], $row["email"], $row["role_id"], $row["role_name"]);
    }

    public function addUser(User $user): int{
        $conn = $this->conn;
        $name = $user->getName();
        $age = $user->getAge();
        $phone = $user->getPhone();

        $sql = "INSERT INTO `user` (`name`, `age`, `phone`) VALUES ('$name', '$age', '$phone')";
        $inserted = mysqli_query($conn, $sql);
        $latestInsertedId = $inserted ? mysqli_insert_id($conn) : -1;
        $this->databaseManager->closeConnection();
        return $latestInsertedId;
    }

    public function updateUser(User $user): void{
        $conn = $this->conn;
        $id = $user->getId();
        $name = $user->getName();
        $age = $user->getAge();
        $phone = $user->getPhone();

        $sql = "update `user` 
            set name = '$name', age = '$age', phone = '$phone' 
            where id = '$id'";

        mysqli_query($conn, $sql);
        $this->databaseManager->closeConnection();
    }

    public function deleteUser(int $id): void
    {
        $conn = $this->conn;
        $sql = "DELETE FROM `user` where id = '$id'";

        mysqli_query($conn, $sql);
        $this->databaseManager->closeConnection();
    }
}

?>