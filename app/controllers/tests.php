<?php namespace simple_mvc;

class tests extends Controller{

	public function index(){
		echo "hello";
		// $this->view('home/index',[
		// 	'name'=>$user->name,
		// 	'mood'
		// ])
	}

//testing if routing system is ok
	public function route(){
		echo "<h1>another route";
	}

//testing if receives params
	public function test_post_and_get(){
		var_export($this->get);
		var_export($this->post);
	}

//testing if receives params
	public function test_params($p1,$p2=0,$p3=0,$p4=0){
		var_export($p1);
		var_export($p2);
		var_export($p3);
		var_export($p4);
	}

//testing if the models system is ok
	public function get_user(){//route: simple-mvc/public/home/get_user
		$user_model = $this->model('User_model');
		$user_model->name = "Alex";
	}

//testing if views are ok
	public function get_view($name){//route: simple-mvc/public/home/get_view/Ahmed
		$data = ['name'=>$name];
		$this->view('home/index',$data);
	}

//testing db & eloquent
	public function find_in_db(){//route: simple-mvc/public/home/find_in_db
		// $email = User_model::create([$user_data]);
		$data = User_model::first();
		echo "<pre>".var_export($data,true);
	}




}
