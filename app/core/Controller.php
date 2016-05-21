<?php namespace simple_mvc;

class Controller{

 	public $messages = [];

	public function __construct(){
		// echo"<pre>";var_export($_SESSION);
		if (session_status() == PHP_SESSION_NONE) session_start();
		if(!empty($_SESSION['messages'])){
			$this->messages = $_SESSION['messages'];
			unset($_SESSION['messages']);
		}
		$this->post = $_POST; //sets the post to $this->post
		$this->get = $_GET;
		unset($this->get['core_url']);
	}

	protected function model($model){
		require_once '../app/models/'.$model.'.php';
		$model_class_name = "simple_mvc\\".$model;
		return new $model_class_name();
	}

	protected function redirect($location){
		$_SESSION['messages'] = $this->messages;
		header("Location: ".Base_URL.$location);
		die;
	}

	//doesn't work
	// public function script($script){
	// 	echo "<script>$script</script>";
	// 	sleep(2);
	// }

	protected function view($view,$data=[]){
		extract($data);
		$messages = $this->messages;
		// echo"<pre>";var_export($data);
		require_once '../app/views/'.$view.'.php';
	}

	protected function controller_or_method_not_found(){
		$this->view('errors/controller_or_method_not_found');
	}



}

?>
