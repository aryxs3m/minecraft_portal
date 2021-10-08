<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Minecraft Settings
    |--------------------------------------------------------------------------
    */

    'server' => env('MINECRAFT_SERVER', '127.0.0.1'),
    'rcon_port' => env('MINECRAFT_RCON_PORT', 25575),
    'rcon_password' => env('MINECRAFT_RCON_PASSWORD', ''),
    'rcon_timeout' => env('MINECRAFT_RCON_TIMEOUT', 10),

    'query_port' => env('MINECRAFT_QUERY_PORT', 25565)

];
