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

	public function read_csv(){
		$csv = new CSV_service();
		$output = $csv->read_csv_file(Base_Directory.'public/service/service.csv');
		$data = [
			'title'=>"CSV Crud",
			'crud_data'=>$output
		];
		$this->view('layout/head',$data);
		$this->view('crud/index',$data);
		$this->view('layout/head');
	}

	public function add_to_csv(){
		$input_data = $this->post;
		$validation_rules = [
			"name" => "required | len:3:9",
			"phone"=> "required | len:7 | all_numbers",
			"address"=> "required"
		];
		$validation = new Validation($input_data,$validation_rules);
		// var_export($this->post);
		// $res = $csv->save_csv_file(Base_Directory.'public/service/service.csv',$this->post);

	}


}
