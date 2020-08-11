<?php

spl_autoload_register(function ($class) {
    $config = require __DIR__ . "/config.php";
    $namespaces = $config['namespaces'];
    foreach ($namespaces as $prefix => $baseDirectory) {
        $baseDirectory = __DIR__ . '/' . $baseDirectory;
        $length = strlen($prefix);
        if (strncmp($prefix, $class, $length)) return;
        $relativeClass = substr($class, $length);
        $file = $baseDirectory . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});
