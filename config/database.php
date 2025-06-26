<?php

return [
    'database_connection' => [
        'driver'        => 'mysql',
        'host'          => env('CONN_BRANCHES_IP', config('jtbranchesconfig.conn_branches_ip')),
        'port'          => env('CONN_BRANCHES_PT', config('jtbranchesconfig.conn_branches_pt')),
        'database'      => env('CONN_BRANCHES_DB', config('jtbranchesconfig.conn_branches_db')),
        'username'      => env('CONN_BRANCHES_UN', config('jtbranchesconfig.conn_branches_un')),
        'password'      => env('CONN_BRANCHES_PW', config('jtbranchesconfig.conn_branches_pw')),
        'charset'       => 'utf8mb4',
        'collation'     => 'utf8mb4_unicode_ci',
        'prefix'        => ''
    ],
];