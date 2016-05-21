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


	public function read_csv($index){
		$csv = new CSV_service();
		$output = $csv->read_csv_file(Base_Directory.'service/service.csv');
		$data = [
			'title'=>"CSV Crud",
			'crud_data'=>$output[$index],
			'index'=>$index
		];
		// echo "<pre>";var_export($data);
		$this->view('layout/head',$data);
		$this->view('crud/read',$data);
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
		if($validation->pass){
			// echo "<pre>";var_export($this->post);
			$csv = new CSV_service();
			$csv_content = $csv->read_csv_file(Base_Directory.'service/service.csv');
			$csv_content[] = $this->post;
			// echo "<pre>";var_export($output);
			$csv->save_csv_file(Base_Directory.'service/service.csv',$csv_content);
			$this->messages['success'] = "Row Added";
			$this->redirect('csv/index');
		}else{
			// echo "<pre>";var_export($validation->messages);
			$this->messages['validation_msgs'] = $validation->messages;
			$this->redirect('csv/index');
		}
		// var_export($this->post);

	}


	public function edit_csv($index){
		$input_data = $this->post;
		$validation_rules = [
			"name" => "required | len:3:9",
			"phone"=> "required | len:7 | all_numbers",
			"address"=> "required"
		];
		$validation = new Validation($input_data,$validation_rules);
		if($validation->pass){
			// echo "<pre>";var_export($this->post);
			$csv = new CSV_service();
			$csv_content = $csv->read_csv_file(Base_Directory.'service/service.csv');
			$csv_content[$index] = $this->post;
			// // echo "<pre>";var_export($output);
			$csv->save_csv_file(Base_Directory.'service/service.csv',$csv_content);
			$this->messages['success'] = "Row Edited";
			$this->redirect('csv/index');
		}else{
			// echo "<pre>";var_export($validation->messages);
			$this->messages['validation_msgs'] = $validation->messages;
			$this->redirect('csv/read_csv/'.$index);
		}
		// var_export($this->post);

	}


	public function delete_from_csv($index){
			$csv = new CSV_service();
			$csv_content = $csv->read_csv_file(Base_Directory.'service/service.csv');
			// echo "<pre>";var_export($csv_content);
			unset($csv_content[$index]);
			// echo "<pre>";var_export($csv_content);
			$csv->save_csv_file(Base_Directory.'service/service.csv',$csv_content);
			$this->messages['info'] = "Row Deleted";
			$this->redirect('csv/index');
	}



}
