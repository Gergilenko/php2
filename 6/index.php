<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:46
 */

//Front Controller
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/autoload.php';


$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$ctrlClassName = $ctrl . 'Controller';
$controller = new $ctrlClassName;
$method = 'action' . $act;

$controller->$method();