<?php


/**
 * @author      Hi-Teak Digital Solution Ltd
 * @copyright   Copyright (c), 2023 Hi-Teak Digital Solution Ltd
 * @license     MIT public license
 */

//Set the session name
session_name('dataSession');
//Start the session
if (!isset($_SESSION)) {
    session_start();
}


date_default_timezone_set('Asia/Baghdad');


// In case one is using PHP 5.4+'s built-in server
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}


// Include the Router class
// @note: it's recommended to just use the composer autoloader when working with other packages too
// Require composer autoloader
require_once __DIR__ . '/vendor/autoload.php';



/**
 * Include router web file
 */
require_once __DIR__ . '/router/web.php';


/**
 * Include router api file
 */
require_once __DIR__ . '/router/api.php';
