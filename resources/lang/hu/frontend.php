<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Frontend Language Lines
    |--------------------------------------------------------------------------
    */

    'save' => 'Mentés',
    'upload' => 'Feltöltés',

    'home' => [
        'online' => 'Online',
        'offline' => 'Offline',
        'players' => 'játékosok',
        'ping' => 'ping',
        'now_playing' => 'Most játszik',
        'last_ip' => 'Utolsó IP cím'
    ],

    'passwordchange' => [
        'new_password' => 'Új jelszó',
        'new_password_again' => 'Új jelszó újra',
        'successful' => 'Sikeres jelszócsere!'
    ],

    'skinchange' => [
        'current_skin' => 'Jelenlegi skin',
        'upload_new_skin' => 'Új skin feltöltése',
        'standard' => 'Standard',
        'slim' => 'Slim',
        'error_upload' => 'A skin feltöltése során hiba történt. Próbálkozz később!',
        'error_mineskin' => 'A MineSkin jelenleg nem elérhető. Próbálkozz később!'
    ],

    'admin' => [
        'create' => 'Új',
        'edit' => 'Szerkeszt',
        'delete' => 'Töröl',
        'send' => 'Küldés',
        'edit_rcon_command' => 'RCON parancs szerkesztése',
        'edit-roles' => 'Jogok',
        'roles' => 'Szerepkörök',
        'permissions' => 'Jogosultásgok',
        'fields' => [
            'email' => 'E-mail',
            'command' => 'Parancs'
        ],
        'players' => [
            'invite' => 'Meghívás'
        ],
        'simple_rcon' => [
            'commands' => 'Parancsok',
            'kick' => 'Kirúgás',
            'manage_commands' => 'Parancsok kezelése',
            'terminal' => 'Terminál'
        ],
        'monitoring' => [
            'tps' => 'TPS',
            'server_ticks_per_seconds' => 'Szerver tick/mp',
            'memory' => 'Memória',
            'ram_usage' => 'RAM használat',
            '1_min' => '1 perc',
            '5_min' => '5 perc',
            '15_min' => '15 perc',
            'used_memory' => 'Használt',
            'all_memory' => 'Összes',
            'ping' => 'Ping',
            'ping_in_ms' => 'Ping ezredmásodpercben',
            'players' => 'Játékosok',
            'online_players' => 'Online játékosok száma',
            'warning_no_schedule' => "Nem érkezett adat. Ha 1 perc múlva is üresek a grafikonok, ellenőrizd, hogy megfelelően beállítottad-e a crontabot!",
            'warning_tps' => 'Figyelem! Alacsony a TPS! A szerver laggolhat!'
        ]
    ]
];
