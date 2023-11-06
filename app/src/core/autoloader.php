<?php
function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            if (false !== strpos($path, '.php')){
                require_once $path;
            }
        } else if ($value != "." && $value != ".." ) {
            getDirContents($path, $results);
        }
    }
    return $results;
}

getDirContents(APP_DIR);
