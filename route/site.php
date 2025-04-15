<?php
    $userMiddleWare = new UserMiddleWare();
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])) {

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])) {

        } else if (isset($_GET['param_1'])) {
            switch ($_GET['param_1']) {
                case 'index.php':
                    $userMiddleWare->index();
                    break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])) {

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])) {

        } else if (isset($_GET['param_1'])) {

        }
    }
?>