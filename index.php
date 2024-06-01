<?php

/**
 * Bootstrap page
 * Require file autoload dari vendor
 */
require_once __DIR__ . '/vendor/autoload.php';

use Controllers\ControllerHome;

use Dotenv\Dotenv;

// TESTING UPDATE GIT

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * Buat objek dari kelas Controller
 */
$controllerHome = new ControllerHome();

$baseUrl	= $_ENV['BASE_URL'];
$url 		= 'http' . (($_SERVER['SERVER_PORT'] == 443) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$pageTemp 	= ltrim(substr($url, strlen($baseUrl)), '?');

if (strpos($pageTemp, '102') !== false) {
	$page = explode('/', $pageTemp)[0];
	$id = isset(explode('/', $pageTemp)[1]) ? explode('/', $pageTemp)[1] : '';
}

// tentukan bagaimana halaman akan di-load
if (empty($page)) {
	// pemanggilan method yang akan di-run
	$controllerHome->index();
} else {
	switch ($page) {
			// case 'proid':
			// 	$controllerHome->index($id);
			// 	break;
		case '102':
			$controllerHome->_102();
			break;
		default:
			$controllerHome->index();
			break;
	}
}
