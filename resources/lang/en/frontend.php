<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Frontend Language Lines
    |--------------------------------------------------------------------------
    */

    'save' => 'Save',
    'upload' => 'Upload',

    'home' => [
        'online' => 'Online',
        'offline' => 'Offline',
        'players' => 'players',
        'ping' => 'ping',
        'now_playing' => 'Now playing',
        'last_ip' => 'Last IP address'
    ],

    'passwordchange' => [
        'new_password' => 'New password',
        'new_password_again' => 'New password again',
        'successful' => 'Password changed successfully!'
    ],

    'skinchange' => [
        'current_skin' => 'Current skin',
        'upload_new_skin' => 'Upload new skin',
        'standard' => 'Standard',
        'slim' => 'Slim',
        'error_upload' => 'An error happened during uploading your skin. Please try again later!',
        'error_mineskin' => 'MineSkin is currently unavailable. Try again later!'
    ],

    'admin' => [
        'create' => 'Create New',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'send' => 'Send',
        'edit_rcon_command' => 'Edit RCON Command',
        'edit-roles' => 'Roles',
        'roles' => 'Roles',
        'permissions' => 'Permissions',
        'fields' => [
            'email' => 'E-mail',
            'command' => 'Command'
        ],
        'players' => [
            'invite' => 'Invite'
        ],
        'simple_rcon' => [
            'commands' => 'Commands',
            'kick' => 'Kick',
            'manage_commands' => 'Manage Commands',
            'terminal' => 'Terminal'
        ],
        'monitoring' => [
            'tps' => 'TPS',
            'server_ticks_per_seconds' => 'Server ticks/seconds',
            'memory' => 'Memory',
            'ram_usage' => 'RAM Usage',
            '1_min' => '1 min',
            '5_min' => '5 min',
            '15_min' => '15 min',
            'used_memory' => 'Used Memory',
            'all_memory' => 'All Memory',
            'ping' => 'Ping',
            'ping_in_ms' => 'Ping in milliseconds',
            'players' => 'Players',
            'online_players' => 'Number of online players',
            'warning_no_schedule' => "No monitor data found. Refresh after 1 minute. If you still don't see data, check your crontab!",
            'warning_tps' => 'Warning! Low TPS detected! Your server may lagging!'
        ]
    ],

    'permissions' => [
        'user.skin.change' => 'Skin change'
    ],

    'crud_labels' => [
        'id' => 'ID',
        'username' => 'Username',
        'email' => 'E-mail',
        'ip' => 'IP',
        'admin' => 'Admin',
        'value' => 'Value',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'datetime' => 'Timestamp',
        'log' => 'Type',
        'user' => 'User',
        'model' => 'Which',
        'description' => 'Description'
    ]
];
