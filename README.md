# Very simple tab page written in PHP
For authentication, use nginx auth_basic
* https://nginx.org/en/docs/http/ngx_http_auth_basic_module.html
* https://github.com/linuxserver/docker-swag#security-and-password-protection

Loosely influenced by the [Organizr project](https://github.com/causefx/Organizr), most images are stolen from their repository. If you are looking for a more advanced product i would suggest you check out their project, this is made to be very basic.

## Usage, just edit the index.php
```php
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
The tabs array use images from the img/ folder.

#### Oh, and you can refresh tabs by double clicking the icons.
