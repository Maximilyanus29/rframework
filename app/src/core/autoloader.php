<?php
//function getDirContents($dir, &$results = array()) {
//    $files = scandir($dir);
//
//    foreach ($files as $key => $value) {
//        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
//        if (!is_dir($path)) {
//            if (false !== strpos($path, '.php')){
//                require_once $path;
//            }
//        } else if ($value != "." && $value != ".." ) {
//            getDirContents($path, $results);
//        }
//    }
//    return $results;
//}
//
//getDirContents(APP_DIR);

function my_autoloader($class_name) {
    $directories = array(APP_DIR);

    foreach ($directories as $directory) {
        recursive_autoload($class_name, $directory);
    }
}

function recursive_autoload($class_name, $directory) {
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') {
            continue;
        }

        $path = $directory . "/" . $file;
        if (is_dir($path)) {
            recursive_autoload($class_name, $path . '/');
        } elseif (is_file($path) && $file == $class_name . '.php') {
            require($path);
            return;
        }
    }
}

spl_autoload_register('my_autoloader');