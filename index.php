<html>
    <head>

        <title>Form Debugger</title>
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
