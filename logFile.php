<?php
if (! empty($_SERVER['QUERY_STRING'])) {
    $currentLogFile = str_replace('file=', '', $_SERVER['QUERY_STRING']);
}
if ($file = fopen($currentLogFile, "r")):
?>
<div class="log-file-header">
    <h1>

        <?php
        if (filesize($currentLogFile) == 0) {
            echo "THE LOG FILE $currentLogFile IS EMPTY";
        } else {
            echo "CONTENT OF LOG FILE $currentLogFile";
        }
        ?>
    </h1>
    <div class="list-log-files">
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
</div>
<div class="log-file-content">
    <?php
    echo '<div >';
    while (! feof($file)) {
        echo fgets($file) . '<br/>';
    }
    echo '</div>';
    fclose($file);
    endif;
    ?>
</div>