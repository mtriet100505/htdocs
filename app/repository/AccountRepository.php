<?php

    class AccountRepository{
        private DatabaseManager $databaseManager;
        private mysqli $conn;
        public function __construct()
        {
            $this->databaseManager = DatabaseManager::getInstance();
            $this->conn = $this->databaseManager->getConnection();
        }

        public function getAccountByUserId(int $userId) : Account
        {
            $conn = $this->databaseManager->getConnection();
            $stmt = $conn->prepare("SELECT acc.id, acc.email, acc.password FROM `account` as acc WHERE user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return $result->num_rows === 0 ?
                new Account() :
                new Account($row['id'], $row['email'], $row['password'], $userId);
        }

        public function addAccount(Account $account) : int
        {
            $conn = $this->conn;
            $email = $account->getEmail();
            $password = $account->getPassword();
            $user_id = $account->getUserId();
            $role_id = $account->getRoleId();

            $sql = "INSERT INTO `account` (`email`, `password`, `user_id`, `role_id`) VALUES ('$email', '$password', '$user_id', '$role_id')";
            $inserted = mysqli_query($conn, $sql);
            $latestInsertedId = $inserted ? mysqli_insert_id($conn) : -1;
            $this->databaseManager->closeConnection();
            return $latestInsertedId;
        }

        public function updateAccountByUserId(Account $account): void{
            $conn = $this->conn;
            $user_id = $account->getUserId();
            $email = $account->getEmail();
            $role_id = $account->getRoleId();

            $sql = "update `account` 
            set email = '$email', role_id = '$role_id'
            where user_id = '$user_id'";

            mysqli_query($conn, $sql);
            $this->databaseManager->closeConnection();
        }

        public function deleteAccountByUserId(int $user_id): void
        {
            $conn = $this->conn;
            $sql = "DELETE FROM `account` where user_id = '$user_id'";

            mysqli_query($conn, $sql);
            $this->databaseManager->closeConnection();
        }

        public function checkLogin(Account $account) : bool
        {
            $email = $account->getEmail();
            $password = md5($account->getPassword());
            $conn = $this->conn;
            $stmt = $conn->prepare("SELECT `account`.`id` FROM `account` WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->num_rows > 0;
        }


    }

?>