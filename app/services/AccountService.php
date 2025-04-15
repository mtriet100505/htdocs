<?php
    class AccountService{
        private AccountRepository $accountRepository;
        public function __construct()
        {
            $this->accountRepository = new AccountRepository();
        }

        public function addAccount(Account $account) : int
        {
            return $this->accountRepository->addAccount($account);
        }

        public function deleteAccountByUserId(int $user_id) : void
        {
            $this->accountRepository->deleteAccountByUserId($user_id);
        }

        public function updateAccountByUserId(Account $account) : void
        {
            $this->accountRepository->updateAccountByUserId($account);
        }

        public function getAccountByUserId(int $user_id) : void
        {
            $this->accountRepository->getAccountByUserId($user_id);
        }


    }

?>