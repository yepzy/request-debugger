<a class="link-to-log-files" href="/get-log">🔗 Go to log files</a>
<div class="debbugger">
    <?php if (! empty($_GET)): ?>
    <div class="debugger-item">
        <h1>GET</h1>
        <pre>
            <?php var_dump($_GET); ?>
        </pre>
    </div>
    <?php endif; ?>
    <?php if (! empty($_POST)): ?>
    <div class="debugger-item">
        <h1>POST</h1>
        <pre>
            <?php var_dump($_POST); ?>
        </pre>
    </div>
    <?php endif; ?>
</div>
<?php //Something to write to txt log
$log = "User: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F j, Y, g:i:s a") . PHP_EOL;
if (! empty($_GET)) {
    $log .= "GET" . PHP_EOL;
    $log .= "*************************" . PHP_EOL;
    $log .= json_encode($_GET) . PHP_EOL;
    $log .= "#########################" . PHP_EOL . PHP_EOL;
}
if (! empty($_POST)) {
    $log .= "POST" . PHP_EOL;
    $log .= "*************************" . PHP_EOL;
    $log .= json_encode($_POST) . PHP_EOL;
    $log .= "#########################" . PHP_EOL;
}
$log .= PHP_EOL . PHP_EOL;
$log .= "--------------------------------------------------------------------" . PHP_EOL . PHP_EOL;
//Save string to log, use FILE_APPEND to append.
file_put_contents($currentLogFile, $log, FILE_APPEND);