# Very simple tab page written in PHP
Loosely influenced by the [Organizr project](https://github.com/causefx/Organizr), most images are stolen from their repository. If you are looking for a more advanced product i would suggest you check out their project, this is made to be very basic.

## Usage, just edit the index.php
```php
// 'username' => 'password_hash',
$users = array (
    'admin' => '$2y$10$BMmHXABrS9H0aEvzCOcPjuZRX21ZMw59XQtuZ3f7KiUSmGQGDVhWO',
    'otheruser' => '$2y$10$U65oi9E672fHHaE9ddFUM.MfhOG/8e2eR2H1ZGppLyZROj2gEvXu2',

);

// Can be local path or an full url
//
// 'image.png' => '/link',
$tabs = array(
    'plex.png' => '/plex/',
    'tautulli.png' => '/tautulli/',
    'couchpotato.png' => '/couchpotato/',
    'medusa.png' => '/medusa/',
    'rutorrent.png' => '/rutorrent/',
);
```
There are not different user roles, all users have the same privileges.

Password hash can be generated with an online php password_hash generator, or from shell using:
```sh
php -r 'echo password_hash("password", PASSWORD_DEFAULT);'
```
The tabs array use images from the img/ folder.

#### Oh, and you can refresh tabs by double clicking the icons.
