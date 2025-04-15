<?php

class UserController extends BaseController {
    private UserService $userService;
    private AccountService $accountService;
    private RoleService $roleService;
    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
        $this->accountService = new AccountService();
        $this->roleService = new RoleService();
    }

//    [GET] /
    public function index(): void{
        if (isset($_SESSION['user_login'])){
            echo "Hostname: " . gethostname();
            $userLoginEmail = $_SESSION['user_login'];
            $userLogin = $this->userService->getUserByEmail($userLoginEmail);
            $userList = $this->userService->getUsers();
            $roleList = $this->roleService->getAllRoles();
            $this->Views("user", [
                "userLogin" => $userLogin,
                "users" => $userList,
                "roles" => $roleList
            ]);
        } else{
            header("location: /login");
        }
    }

//    [POST] /user/add
    public function add_user(User $user, Account $account): void{
        $newUserId = $this->userService->addUser($user);
        $account->setUserId($newUserId);
        $newAccountId = $this->accountService->addAccount($account);
//        redirect
        header('location: /');
    }

//    [POST] /user/edit_user
    public function edit_user(User $user, Account $account): void{
        $this->userService->updateUser($user);
        $this->accountService->updateAccountByUserId($account);
        header('location: /');
    }

//    [POST] /user/delete
    public function delete_user($id): void{
        $this->userService->deleteUser($id);
        $this->accountService->deleteAccountByUserId($id);
        header('location: /');
    }

//    [POST, AJAX] /user/add_ajax
    public function add_user_ajax(User $user): void{
        $this->userService->addUser($user);
        include "./views/user/add_user_ajax.php";
    }
}

?>