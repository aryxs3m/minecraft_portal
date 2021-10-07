# Minecraft User and Admin Portal

Laravel 8 web application for your users and OPs.

## Current Features 
- AuthMe authentication, password change
- SkinRestorer skin changer
- Server status page
- Server status API endpoint for integrating to your homepage
- Multilingual (english and hungarian, easily translatable)

## Planned Features
- AuthMe registration support
- Open/invite link only registration support
- Support for multiple permissions/roles
- User administration
- Basic server administration via RCON


## How To Use
- clone repository
- `composer install`
- `chmod +x storage`
- copy `.env.exampe` to `.env`
- edit `.env` (check below)
- `php artisan key:gen`

## .env Settings

Required settings:

| Key | Description |
| --- | ----------- |
| APP_NAME | Used in the HTML title, header, login page. Probably your Minecraft server name |
| APP_DEBUG | **ALWAYS** false on production servers! |
| DB_HOST | MySQL server IP |
| DB_PORT | MySQL server port |
| DB_DATABASE | MySQL database (where AuthMe and SkinRestorer tables are) |
| DB_USERNAME | MySQL username |
| DB_PASSWORD | MySQL password |
| CACHE_DRIVER | If you have Redis installed, set it to `redis`, otherwise `file` is okay |
| SESSION_DRIVER | If you have Redis installed, set it to `redis`, otherwise `file` is okay |
| APP_LOCALE | Application language. Currently `en` and `hu` is supported.
| MINECRAFT_SERVER | Your Minecraft server's IP address or hostname |

Extra settings:

| Key | Description |
| --- | ----------- |
| MINECRAFT_QUERY_PORT | Your Minecraft server's port |
| MINECRAFT_RCON_PORT | RCON port, currently not used |
| MINECRAFT_RCON_PASSWORD | RCON password, currently not used |
| MINECRAFT_RCON_TIMEOUT | RCON timeout, currently not used |

## Thanks for checking this out!

Feel free to create issues, pull-requests, etc.
