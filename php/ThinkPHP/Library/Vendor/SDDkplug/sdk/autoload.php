<?php
spl_autoload_register('autoload');

function autoload($class) {
    $class = __DIR__ . '/' . $class;
    $file = str_replace('\\', '/', $class);
    $file .= '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}