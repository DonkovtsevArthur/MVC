<?php

	class Router
		{
			private $routes;
			
			public function __construct()
			{
					$routesPath = ROOT.'/config/routes.php';
					$this->routes = include($routesPath);
			}
			/**
			* Returns request string
			*/
			private function getURI()
			{
				if(!empty($_SERVER['REQUEST_URI'])) {
				return trim($_SERVER['REQUEST_URI'], '/');					
				}
			}
			public function run()
			{	

				// Получить строку запроса
				$uri = $this->getURI();
				//echo $uri;
				// Ппроверить наличие такого запроса в routes.php
				foreach ($this->routes as $uriPattern => $path){
					//Сравниваем $uriPattern и $uri
					if(preg_match("~$uriPattern~", $uri)) {
						//Определить какой котроллер и action обрабатывают запроса
						$internalRote = preg_replace("~$uriPattern~", $path, $uri);
						$segments = explode('/', $internalRote);
						$controllerName = ucfirst(array_shift($segments)).'Controller';
						$actionName = 'action'.ucfirst(array_shift($segments));
						$parameters = $segments;
						//echo 'Класс: '.$controllerName.'<br>';
						//echo 'Mетод: '.$actionName;
						
						//Подключить файл класса контроллера
						$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
						if(file_exists($controllerFile)) {
							include_once($controllerFile);
						}
						$controllerObject = new $controllerName;
						$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
						if($result != null) {
							break;
						}
					}
				}
			}
			public static function getDb(){
			$db = mysqli_connect('localhost','root','','dz');
			
			return $db;
		}
		}