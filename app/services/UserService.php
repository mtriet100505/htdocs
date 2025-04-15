<?php

class UserService{

    private UserRepository $userRepository;
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getUsers(): array{
        return $this->userRepository->getUsers();
    }

    public function getUserByEmail(string $email): GetUserDto
    {
        return $this->userRepository->getUserByEmail($email);
    }

    public function getUsersAPI():array{
        $api = 'http://localhost/api/get-users.php/';

        $option = array(
            'http' => array(
                'header' => "Content-type: application/json",
                'method' => 'GET',
            )
        );

        $context = stream_context_create($option);
        $result = file_get_contents($api, false, $context);

        $data = array();
        $data_json = json_decode($result, true);
        $data_list = $data_json['data'];

        foreach ($data_list as $row){
            $id = $row['id'];
            $name = $row['name'];
            $age = $row['age'];
            $phone = $row['phone'];

            $user = new User($id, $name, $age, $phone);
            $data[] = $user;
        }

        return $data;
    }

    public function addUserAPI(User $user): void{
        $api = 'http://localhost/api/add-user.php/';
        $input = http_build_query(array(
           "name" => $user->getName(),
           "age" => $user->getAge(),
           "phone" => $user->getPhone()
        ));

        $option = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $input
            )
        );

        $context = stream_context_create($option);
        $result = file_get_contents($api, false, $context);

    }

    public function updateUserAPI(User $user): void{
        $api = 'http://localhost/api/update-user.php/';

        $input = http_build_query(array(
           'id' => $user->getId(),
           "name" => $user->getName(),
           "age" => $user->getAge(),
           "phone" => $user->getPhone()
        ));

        $option = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $input
            )
        );

        $context = stream_context_create($option);
        $result = file_get_contents($api, false, $context);
    }

    public function deleteUserAPI($id): void{
        $api = 'http://localhost/api/delete-user.php/';
        $input = http_build_query(array(
            'id' => $id
        ));

        $option = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $input
            )
        );

        $context = stream_context_create($option);
        $result = file_get_contents($api, false, $context);
    }

    public function addUser(User $user): int {
        return $this->userRepository->addUser($user);
    }

    public function updateUser(User $user): void {
        $this->userRepository->updateUser($user);
    }

    public function deleteUser($id): void {
        $this->userRepository->deleteUser($id);
    }

}

?>