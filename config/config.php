<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');

$_SERVER['DOCUMENT_ROOT'] = "E:\OSPanel\domains\library";
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT. "/controllers/");
define("MODEL_PATH", ROOT. "/models/");
define("VIEW_PATH", ROOT. "/views/");
define("FUNC", ROOT. '/functions/');
require_once("db.php");
require_once("route.php");
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';
require_once CONTROLLER_PATH. 'Controller.php';
require_once FUNC . 'Functions.php';
//Build routes
Routing::buildRoute();

