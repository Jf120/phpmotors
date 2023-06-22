<?php
function template($navList, $main) {

    $navListEcho = "<?php
    echo $navList;
    ?>";

    $mainEcho = require_once $_SERVER['DOCUMENT_ROOT']."/phpmotors/snippets/$main";

    $footerEcho = require_once $_SERVER['DOCUMENT_ROOT']."/phpmotors/snippets/footer.php";

    return "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='/phpmotors/css/main.css' media='screen'>
        <title>Php Motors</title>
    </head>
    <body>
        <header>
            <nav id='page_nav'>
                $navListEcho
            </nav>
        </header>
        <main>
            $mainEcho
        </main>
        <footer id='footer'>
            $footerEcho
        </footer>
        <script src='./js/main.js'></script>
    </body>
    </html>";
    }
?>