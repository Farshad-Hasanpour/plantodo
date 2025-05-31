<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

//TODO: change PROD_SCOPE
define('PROD_SCOPE', '/plantodo');

define('LARAVEL_START', microtime(true));

$root = __DIR__ . '/..';
if (!file_exists($root . '/bootstrap/app.php')) {
	$root = $root . PROD_SCOPE ;
}

if (file_exists($maintenance = $root . '/storage/framework/maintenance.php')) {
    require $maintenance;
}
require $root . '/vendor/autoload.php';
$app = require_once $root . '/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
