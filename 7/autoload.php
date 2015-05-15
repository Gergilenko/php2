<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:53
 */

function __autoload($class) {
    /*
    if (file_exists(__DIR__ . '/controllers/' . $class . '.php')) {
        require __DIR__ . '/controllers/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/models/' . $class . '.php')) {
        require __DIR__ . '/models/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/classes/' . $class . '.php')) {
        require __DIR__ . '/classes/' . $class . '.php';
    }
    */

    $classParts = explode('\\', $class);
    $classParts[0] = __DIR__;
    $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
    //var_dump($path);die;
    if (file_exists($path)) {
        require $path;
    }



}