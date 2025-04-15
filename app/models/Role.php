<?php
    class Role{
        private int $id;
        private string $role_name;

        /**
         * @param int $id
         * @param string $role_name
         */
        public function __construct(int $id, string $role_name)
        {
            $this->id = $id;
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