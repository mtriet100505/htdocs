<?php

class UserMiddleWare
{
    private UserController $userController;
    private RoleService $roleService;
    public function __construct()
    {
        $this->userController = new UserController();
        $this->roleService = new RoleService();
    }

    public function index(): void{
//        check session
        $this->userController->index();
    }

    public function add_user(): void{
        if(!empty($_POST['full_name_add'])
            && !empty($_POST['age_add'])
            && !empty($_POST['phone_add'])
            && !empty($_POST['email_add'])
            && !empty($_POST['password_add'])){
            $name = $_POST['full_name_add'];
            $age = $_POST['age_add'];
            $phone = $_POST['phone_add'];

            $email = $_POST['email_add'];
            $password = $_POST['password_add'];
            $role = "Staff";
            $role_entity = $this->roleService->getRoleByName($role);
            $role_id = $role_entity->getId();
            
            $user = new User(0, $name, $age, $phone);
            $account = new Account(0, $email, md5($password), 0, $role_id);
            $this->userController->add_user($user, $account);
        } else{
//            error
//            session -> save error -> fill to views
            header('location: /');
        }
    }

    public function edit_user(): void{
        if(!empty($_POST['full_name_edit'])
            && !empty($_POST['age_edit'])
            && !empty($_POST['phone_edit'])
            && !empty($_POST['userIdEdit'])
            && !empty($_POST['role_edit'])
        ){
            $id = $_POST['userIdEdit'];
            $name = $_POST['full_name_edit'];
            $age = $_POST['age_edit'];
            $phone = $_POST['phone_edit'];

            $email = $_POST['email_edit'];
            $role = $_POST['role_edit'];
            $role_entity = $this->roleService->getRoleByName($role);
            $role_id = $role_entity->getId();

            $user = new User($id, $name, $age, $phone);

            $account = new Account(0, $email, "", $id, $role_id);
            $this->userController->edit_user($user, $account);
        } else{
            // error
//            session -> save error -> fill to views
            header('location: /');
        }
    }

    public function delete_user(): void{
        if(!empty($_POST['userIdDelete'])){
            $id = $_POST['userIdDelete'];

            $this->userController->delete_user($id);
        } else{
            // error
//            session -> save error -> fill to views
            header('location: /');
        }
    }

    public function add_user_ajax(): void{
        if(!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['phone'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $user = new User(0, $name, $age, $phone);

            $this->userController->add_user_ajax($user);
        } else{
            echo '<p class="alert alert-danger mb-0" style="width: 90%">Add Failed</p>';
        }
    }
}

?>