<?php 
	// FRONT CONTROLLER


	//1. Общие настройки
	ini_set('display_errors',1);
	error_reporting(E_All);
	//2. Подключение файлов системы
	define('ROOT', dirname(__FILE__));
	require_once(ROOT.'/components/router.php');

	//3. Установка соединения с БД
	require_once(ROOT.'/components/db.php');
	
	//4. Вызов Router
	$router = new Router();
	$router->run();