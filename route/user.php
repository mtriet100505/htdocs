<?php
    $userController = new UserController();
    $userMiddleWare = new UserMiddleWare();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])) {

    } else if (isset($_GET['param_1']) && isset($_GET['param_2'])) {

    } else if (isset($_GET['param_1'])) {

    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])) {

    } else if (isset($_GET['param_1']) && isset($_GET['param_2'])) {
        switch ($_GET['param_1']){
            case 'user':
                if($_GET['param_2'] == 'add'){
                    $userMiddleWare->add_user();
                } else if($_GET['param_2'] == 'edit'){
                    $userMiddleWare->edit_user();
                } else if($_GET['param_2'] == 'delete'){
                    $userMiddleWare->delete_user();
                }
//                else if($_GET['param_2'] == 'add_ajax'){
//                    $userMiddleWare->add_user_ajax();
//                }
                break;
        }
    } else if (isset($_GET['param_1'])) {

    }
}


?>