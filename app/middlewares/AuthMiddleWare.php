<?php
    class AuthMiddleWare{
        private AuthController $authController;
        public function __construct(){
            $this->authController = new AuthController();
        }

        // [POST] /login
        public function login_POST()
        {
            $error = "";
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $error = "Please fill out all fields.";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format.";
            }

            $rawData = [
                'email' => $email,
                'password' => $password,
                'error' => $error
            ];
            
            $this->authController->login_POST($rawData);
        }
    }

?>