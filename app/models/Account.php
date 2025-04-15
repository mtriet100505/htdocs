<?php
    class Account{
        private int $id;
        private string $email;
        private string $password;
        private int $user_id;
        private int $role_id;

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        public function getPassword(): string
        {
            return $this->password;
        }

        public function setPassword(string $password): void
        {
            $this->password = $password;
        }

        public function getUserId(): int
        {
            return $this->user_id;
        }

        public function setUserId(int $user_id): void
        {
            $this->user_id = $user_id;
        }

        public function getRoleId(): int
        {
            return $this->role_id;
        }

        public function setRoleId(int $role_id): void
        {
            $this->role_id = $role_id;
        }

        /**
         * @param int $id
         * @param string $email
         * @param string $password
         * @param int $user_id
         */
        public function __construct(int $id = 0, string $email = "", string $password = "", int $user_id = 0, int $role_id = 2)
        {
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->user_id = $user_id;
            $this->role_id = $role_id;
        }

    }

?>