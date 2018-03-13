<?php
if(!empty($_SERVER['QUERY_STRING'])){
    $currentLogFile = str_replace('file=','',$_SERVER['QUERY_STRING']);
}
if ($file = fopen($currentLogFile, "r")) {
echo '<h1 style="position:fixed;width: 100%; display:block;background: white;margin:0;padding: 20px 0;top:0;">';
if (filesize($currentLogFile) == 0) {
    echo "THE LOG FILE $currentLogFile IS EMPTY";
} else {
    echo "CONTENT OF LOG FILE $currentLogFile";
}
echo '</h1>';
?>
<div style="width: 100%;background: aliceblue;max-height: 125px;max-width: 100%;overflow-y: auto;position: fixed;top:77px;">
    <?php
    $logFiles = glob('./log_*.txt');
    if (! empty($logFiles)) {
        $counter = 0;
        foreach ($logFiles as $logFile) {
            if ($counter % 5 == 0)
                echo '<ul style="width: 200px;display: inline-block;vertical-align: top;">';
            echo '<li>';
            echo '<a href="?file=' . $logFile . '">' . $logFile . '</a >';
            echo '</li>';
            if ($counter % 5 == 4)
                echo '</ul>';
            $counter++;
        }
    }
    ?>
</div>
<div style="padding-top:202px">

    <?php
    echo '<div >';
    while (! feof($file)) {
        echo fgets($file) . '<br/>';
    }
    echo '</div>';
    fclose($file);
    }
    ?>
</div>