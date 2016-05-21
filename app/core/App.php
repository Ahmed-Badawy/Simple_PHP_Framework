<?php namespace simple_mvc;

class App{

	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];


	public function __construct(){
		$url = $this->parseURL();
		// var_export($url);

//get instance of controller
		if( isset($url[0]) && file_exists('../app/controllers/'.$url[0].'.php') ){
			$this->controller = $url[0];
			unset($url[0]);
		} else if(isset($url[0])) $this->method = "controller_or_method_not_found";
		// require_once '../app/controllers/'.$this->controller.'.php';
		$this->controller = 'simple_mvc\\'.$this->controller;
		$this->controller = new $this->controller;
		// var_dump($this->controller);

//get the method
		if( isset($url[1]) && method_exists($this->controller,$url[1]) ){
				$this->method = $url[1];
				unset($url[1]);
		} else if(isset($url[1])) $this->method = "controller_or_method_not_found";
		// var_dump($this->method);



		$this->params = $url ? array_values($url) : [];
		// print_r($this->params);

//call the method from the controller instance & pass the params to the method:-
		call_user_func_array( [$this->controller, $this->method], $this->params);

	}


//exploding the url with slashes / . then returns a url array of params
	protected function parseURL(){
		if(isset($_GET['core_url'])){
			$url = $_GET['core_url'];
			$url = rtrim($url,'/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/',$url);
			return $url;
		}
	}



}

?>
