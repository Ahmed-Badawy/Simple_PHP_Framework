<?php namespace simple_mvc;

class Controller{

	public function __construct(){
		$this->post = $_POST; //sets the post to $this->post
		$this->get = $_GET;
		unset($this->get['core_url']);
	}

	public function model($model){
		require_once '../app/models/'.$model.'.php';
		$model_class_name = "simple_mvc\\".$model;
		return new $model_class_name();
	}

	public function view($view,$data=[]){
		require_once '../app/views/'.$view.'.php';
	}

	public function controller_or_method_not_found(){
		$this->view('errors/controller_or_method_not_found');
	}


}

?>
