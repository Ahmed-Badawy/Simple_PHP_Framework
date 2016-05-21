<?php namespace simple_mvc;

class home extends Controller{

	public function index(){
		$data=[
			'title'=>"Main Page",
			'name'=>"World !"
		];
		$this->view('layout/head',$data);
		$this->view('home/index',$data);
		$this->view('layout/head');
	}

}
