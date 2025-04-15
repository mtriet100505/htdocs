<?php
    class RoleRepository{
        private DatabaseManager $databaseManager;
        private mysqli $conn;
        public function __construct()
        {
            $this->databaseManager = DatabaseManager::getInstance();
            $this->conn = $this->databaseManager->getConnection();
        }

        public function getRoles() : array{
            $sql = "SELECT * FROM role";
            $result = $this->conn->query($sql);
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = new Role($row["id"], $row["role_name"]);
            }
            $this->databaseManager->closeConnection();
            return $data;
        }

        public function getRoleByName(string $name) : Role
        {
            $sql = "SELECT * FROM role WHERE role_name = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return $result->num_rows === 0 ?
                new Role(0, ""):
                new Role($row["id"], $row["role_name"]);
        }
    }

?>