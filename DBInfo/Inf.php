<?php
    $GLOBALS['config'] = array(
        'mysql' => array(
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => 'LilBump$26112001',
            'db' => 'compshop',
        ),
        'remember' => array(
            'cookie_name' => 'hash',
            'cookie_expiry' => 86400,
        ),
        'session' => array(
            'session_name' => array('user', 'admin', 'superadmin'),
            'token_name' => 'token',
        ),
    );
    ?>