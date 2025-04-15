<?php
    class AuthService {
        private AccountRepository $accountRepository;

        public function __construct() {
            $this->accountRepository = new AccountRepository();
        }

        // [POST] /login
        public function login_POST(Account $account)
        {
            return $this->accountRepository->checkLogin($account);
        }
    }

?>