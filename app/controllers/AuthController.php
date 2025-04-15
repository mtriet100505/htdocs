<?php
    class AuthController extends BaseController {
        private AuthService $authService;

        public function __construct()
        {
            parent::__construct();
            $this->authService = new AuthService();
        }

        // [GET] /login
        public function login(): void
        {
            if(isset($_SESSION['user_login'])){
                header('location: /');
            }else{
                $data = [];
                if (isset($_SESSION['error'])
                    && isset($_SESSION['email'])
                    && isset($_SESSION['password'])) {
                    $data = [
                        'email' => $_SESSION['email'],
                        'password' => $_SESSION['password'],
                        'error' => $_SESSION['error']
                    ];
                }

                $this->Views("login", $data);
            }
        }

        // [POST] /login
        public function login_POST($rawData): void
        {
            $account = new Account(0, $rawData['email'], $rawData['password'], 0);
            $isContainEmployee = $this->authService->login_POST($account);
            if ($isContainEmployee){
                $_SESSION['user_login'] = $rawData['email'];
                header('location: /');
            } else{
                $_SESSION['email'] = $rawData['email'];
                $_SESSION['password'] = $rawData['password'];
                $_SESSION['error'] = $rawData['error'] != '' ? $rawData['error'] : "Wrong password.";
                header('location: /login');
            }
        }

        // [POST] /logout
        public function logout(): void
        {
            session_destroy();
            header('location: /login');
        }

    }

?>