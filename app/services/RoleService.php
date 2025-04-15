<?php
    class RoleService{
        private RoleRepository $roleRepository;
        public function __construct()
        {
            $this->roleRepository = new RoleRepository();
        }

        public function getAllRoles() : array{
            return $this->roleRepository->getRoles();
        }

        public function getRoleByName(string $name) : Role
        {
            return $this->roleRepository->getRoleByName($name);
        }

    }

?>