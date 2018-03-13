<html>
    <head>
        <title>Form Debugger</title>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
        <style>
            .log-file-header {
                width: 100%;
                background: white;
                margin: 0;
                padding: 10px 5px;
                top: 0;
            }

            .log-file-header > h1 {
                display: inline-block;
                width: 100%;
            }

            .log-file-header > .list-log-files {
                width: 100%;
                background: aliceblue;
                max-height: 125px;
                overflow-y: auto;
            }

            .log-file-content {
                border: darkslateblue solid 2px;
                margin: 10px;
                max-height: calc(100vh - 202px);
                overflow-y: auto;
                padding: 5px;
            }

            .link-to-log-files {
                position: absolute;
                top: 5px;
                right: 5px;
                padding: 5px;

            }

            .debbugger {
                padding: 10px;
                margin-top: 30px
            }

            .debbugger > .debugger-item {
                border: darkslateblue solid 2px;
                padding: 5px;

            }
        </style>
    </head>
    <body>
        <?php
        $currentLogFile = './log_' . date("j-n-Y") . '.txt';

        if (preg_match('/get-log/', $_SERVER['REQUEST_URI'])) {
            include_once 'logFile.php';
        } else {
            include_once 'debugger.php';
        }
        ?>
    </body>
</html>
