<?php namespace simple_mvc;

class csv extends Controller{

	public function index(){
		$csv = new CSV_service();
		$output = $csv->read_csv_file(Base_Directory.'service/service.csv');
		$data = [
			'title'=>"CSV Crud",
			'crud_data'=>$output
		];
		$this->view('layout/head',$data);
		$this->view('crud/index',$data);
		$this->view('layout/head');
	}

	public function json(){
		$csv = new CSV_service();
		$output = $csv->read_csv_file(Base_Directory.'service/service.csv');
		header('Content-Type: application/json');
		echo json_encode($output, JSON_PRETTY_PRINT);
	}


	public function create(){
		$input_data = $this->post;
		$validation_rules = [
			"name" => "required | len:3:9",
			"phone"=> "required | len:7 | all_numbers",
			"address"=> "required"
		];
		$validation = new Validation($input_data,$validation_rules);
		if($validation->pass){
			$csv = new CSV_service();
			$csv_content = $csv->read_csv_file(Base_Directory.'service/service.csv');
			$csv_content[] = $this->post;
			$csv->save_csv_file(Base_Directory.'service/service.csv',$csv_content);
			$this->messages['success'] = "Row Added";
			$this->redirect('csv/index');
		}else{
			$this->messages['validation_msgs'] = $validation->messages;
			$this->redirect('csv/index');
		}
	}


	public function read($index){
		$csv = new CSV_service();
		$output = $csv->read_csv_file(Base_Directory.'service/service.csv');
		$data = [
			'title'=>"CSV Crud",
			'crud_data'=>$output[$index],
			'index'=>$index
		];
		$this->view('layout/head',$data);
		$this->view('crud/read',$data);
		$this->view('layout/head');
	}


	public function update($index){
		$input_data = $this->post;
		$validation_rules = [
			"name" => "required | len:3:9",
			"phone"=> "required | len:7 | all_numbers",
			"address"=> "required"
		];
		$validation = new Validation($input_data,$validation_rules);
		if($validation->pass){
			$csv = new CSV_service();
			$csv_content = $csv->read_csv_file(Base_Directory.'service/service.csv');
			$csv_content[$index] = $this->post;
			$csv->save_csv_file(Base_Directory.'service/service.csv',$csv_content);
			$this->messages['success'] = "Row Edited";
			$this->redirect('csv/index');
		}else{
			$this->messages['validation_msgs'] = $validation->messages;
			$this->redirect('csv/read/'.$index);
		}
	}


	public function delete($index){
			$csv = new CSV_service();
			$csv_content = $csv->read_csv_file(Base_Directory.'service/service.csv');
			unset($csv_content[$index]);
			$csv->save_csv_file(Base_Directory.'service/service.csv',$csv_content);
			$this->messages['info'] = "Row Deleted";
			$this->redirect('csv/index');
	}



}
