<?php
    class GetUserDto {
        private int $id;
        private string $name;
        private int $age;
        private string $phone;
        private string $email;
        private int $role_id;
        private string $role_name;

        /**
         * @param int $id
         * @param string $name
         * @param int $age
         * @param string $phone
         * @param string $email
         */
        public function __construct(int $id, string $name, int $age, string $phone, string $email, int $role_id, string $role_name)
        {
            $this->id = $id;
            $this->name = $name;
            $this->age = $age;
            $this->phone = $phone;
            $this->email = $email;
            $this->role_id = $role_id;
            $this->role_name = $role_name;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function setName(string $name): void
        {
            $this->name = $name;
        }

        public function getAge(): int
        {
            return $this->age;
        }

        public function setAge(int $age): void
        {
            $this->age = $age;
        }

        public function getPhone(): string
        {
            return $this->phone;
        }

        public function setPhone(string $phone): void
        {
            $this->phone = $phone;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        public function getRoleId(): int
        {
            return $this->role_id;
        }

        public function setRoleId(int $role_id): void
        {
            $this->role_id = $role_id;
        }

        public function getRoleName(): string
        {
            return $this->role_name;
        }

        public function setRoleName(string $role_name): void
        {
            $this->role_name = $role_name;
        }
    }

?>