<?php

//    define("hostname", "db");
//    define("username", "user");
//    define("password", "password");
//    define("database", "users");

    class DatabaseManager{
        private string $hostname = "db";
        private string $username = "user";
        private string $password = "password";
        private string $database = "users";
        private static ?DatabaseManager $instance = null;
        private ?mysqli $conn = null;
        private function __construct(){}

        public static function getInstance(): DatabaseManager
        {
            if(self::$instance == null)
                self::$instance = new DatabaseManager();
            return self::$instance;
        }

        public function getConnection(): mysqli{
            if ($this->conn == null){
                $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
                if(!$this->conn)
                    die("Connection failed: ".mysqli_connect_error());
            }
            return $this->conn;
        }

        public function closeConnection(): void
        {
            if(!$this->conn != null){
                mysqli_close($this->conn);
                $this->conn = null;
            }
            self::$instance = null;
        }
    }

?>