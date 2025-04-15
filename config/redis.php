<?php
    $redis = new Redis();
    $redis->connect('redis', 6379);

    session_set_save_handler(
        'open',
        'close',
        'read',
        'write',
        'destroy',
        'gc'
    );

    session_start();

    function open($save_path, $session_name) {
        global $redis;
        return true;
    }

    function close() {
        return true;
    }

    function read($session_id) {
        global $redis;
        $data = $redis->get("PHPREDIS_SESSION:$session_id");
        return $data ? $data : '';
    }

    function write($session_id, $data) {
        global $redis;
        $redis->set("PHPREDIS_SESSION:$session_id", $data);
        return true;
    }

    function destroy($session_id) {
        global $redis;
        $redis->del("PHPREDIS_SESSION:$session_id");
        return true;
    }

    function gc($maxlifetime) {
        return true;
    }
?>