<?php

// online generator: phppasswordhash.com
// examble password hash from shell:
// [me@local ~]$ php -r 'echo password_hash("password", PASSWORD_DEFAULT);'
//
// 'username' => 'password_hash',
$users = array (
    'admin' => '$2y$10$BMmHXABrS9H0aEvzCOcPjuZRX21ZMw59XQtuZ3f7KiUSmGQGDVhWO',

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


// no edit from here

session_start();

$head = <<<EOF
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
EOF;

$login_form = <<<EOF
        <form id="login" method="post">
            <input id="username" placeholder="Username" name="username" type="text" required><br />
            <input id="password" placeholder="Password" name="password" type="password" required><br />
            <input type="submit" value="Login">
        </form>
EOF;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["username"]) && !empty($_POST["password"])) {
    // Authenticate
    foreach($users as $username => $password_hash) {
        if ($_POST["username"] === $username && password_verify($_POST["password"], $password_hash)) {
            $_SESSION["authenticated"] = TRUE;
            header('Location: index.php');
            break;

        }
    }
    echo "Auth failed.\n";

} elseif ($_SERVER['QUERY_STRING'] == "logout") {
    // Logout
    unset($_SESSION["authenticated"]);
    header('Location: index.php');

} else {

    // open html, print head and open body
    echo "<html>\n{$head}\n\t<body>\n";

    if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != TRUE) {
        // Not logged in
        echo "{$login_form}\n";

    } else {
        // Logged in

        // Tablist, plus logout
        echo "\t\t<div id=\"tablist\">\n";

        foreach ($tabs as $image => $link) {
            $name = ucfirst(pathinfo($image, PATHINFO_FILENAME));
            echo "\t\t\t<input type=\"image\" src=\"img/{$image}\" onclick=\"openTab('{$name}')\" ondblclick=\"refreshTab('{$name}')\" />\n";
        }
        echo "\t\t\t<input type=\"image\" src=\"img/logout.png\" onclick=\"window.location = 'index.php?logout';\" />\n";

        // Content
        echo "\t\t</div>\n\t\t<div id=\"content\">\n";

        foreach ($tabs as $image => $link) {
            $name = ucfirst(pathinfo($image, PATHINFO_FILENAME));
            echo "\t\t\t<iframe src=\"{$link}\" height=\"100%\" width=\"100%\" id=\"{$name}\"></iframe>\n";
        }

        echo "\t\t</div>\n";

    }

    // Close body and html
    echo "\t</body>\n</html>";

}
// vim: set ts=4 sw=4 tw=0 et :
?>
