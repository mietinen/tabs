<?php
// For authentication, use nginx auth_basic

// Can be local path or an full url
//
// 'image.png' => '/link',
$tabs = array(
    'plex.png'      => '/plex/',
    'tautulli.png'  => '/tautulli/',
    // 'couchpotato.png' => '/couchpotato/',
    // 'medusa.png' => '/medusa/',
    // 'rutorrent.png' => '/rutorrent/',
    'radarr.png'    => '/radarr/',
    'sonarr.png'    => '/sonarr/',
    'jackett.png'   => '/jackett/',
    'bazarr.png'    => '/bazarr/',
    'deluge.png'    => '/deluge/',
);

// no edit from here
?>
<html>
    <head>
        <title>Tabs</title>
        <style type="text/css">
            body {
                display: flex;
                overflow: hidden;
                background: #151515;
                color: white;
            }
            #tablist {
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                width: 40px;
                text-align: center;
            }
            #content {
                position: absolute;
                top: 0;
                left: 40px;
                bottom: 0;
                right: 0;
            }
            #tablist input {
                width: 30px;
                height: 30px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            #content iframe {
                border: none;
                display: none;
            }
            #login {
                margin:auto;
            }
            #login input {
                font-size: xx-large;
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
            }
        </style>
        <script>
        function openTab(tabName) {
            var i, tabcontent;
            tabcontent = document.getElementById("content").getElementsByTagName("iframe");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
            document.title = 'Tabs: ' + tabName;
        }
        function refreshTab(tabName) {
            document.getElementById(tabName).contentWindow.location.reload();
        }
        </script>
    </head>
    <body>
        <div id="tablist">
<?php
foreach ($tabs as $image => $link) {
    $name = ucfirst(pathinfo($image, PATHINFO_FILENAME));
    echo "\t\t\t<input type=\"image\" src=\"img/{$image}\" onclick=\"openTab('{$name}')\" ondblclick=\"refreshTab('{$name}')\" />\n";
}
?>
        </div>
        <div id="content">
<?php
foreach ($tabs as $image => $link) {
    $name = ucfirst(pathinfo($image, PATHINFO_FILENAME));
    echo "\t\t\t<iframe src=\"{$link}\" height=\"100%\" width=\"100%\" id=\"{$name}\"></iframe>\n";
}
?>
        </div>
    </body>
</html>
