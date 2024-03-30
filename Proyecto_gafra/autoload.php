<?php
function custom_autoload($class) {
    $controllers_path = 'controllers/' . $class . '.php';
    $models_path = 'models/' . $class . '.php';

    if (file_exists($controllers_path)) {
        include_once $controllers_path;
    } elseif (file_exists($models_path)) {
        include_once $models_path;
    }
}

spl_autoload_register('custom_autoload');
?>