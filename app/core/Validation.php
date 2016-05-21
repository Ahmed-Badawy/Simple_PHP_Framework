<?php namespace simple_mvc;

class Validation{

	public $messages = [];
	public $pass = false;


	public function __construct($validated_data,$rules){
		$this->data = $validated_data;
		$this->rules = $rules;
		$this->evaluate_rules();
		if(empty($this->messages)) $this->pass = true;
	}

	private function evaluate_rules(){
		foreach($this->rules as $prop=>$rules){
			$rule_array = explode('|',$rules);
			// var_export($rule_array);die;
			foreach($rule_array as $rule){
				$rule = trim($rule);
				if($rule=='required') $this->is_required($prop);
				elseif($rule=='all_numbers') $this->all_numbers($prop);
				elseif(preg_match("/^len/i",$rule)) $this->is_len($prop,$rule);
			}
		}
	}

	private function is_required($prop){
		if(isset($this->data[$prop])) return;
		else $this->messages[$prop][] = "$prop is Required";
	}

	private function all_numbers($prop){
		if(!isset($this->data[$prop])) return;
		$val = $this->data[$prop];
		if(preg_match("/^\d+$/i",$val)) return;
		else $this->messages[$prop][] = "$prop Must be all numbers";
	}

	private function is_len($prop,$rule){
		$len_array = explode(":",$rule);
		if(!isset($this->data[$prop])) return;
		if(count($len_array) == 2){
			if( strlen($this->data[$prop]) == $len_array[1] ) return;
			else $this->messages[$prop][] = "$prop Length Must Be $len_array[1]";
		}elseif(count($len_array) == 3){
			if( strlen($this->data[$prop]) >= $len_array[1]
						&& strlen($this->data[$prop]) <= $len_array[2] ) return;
			else $this->messages[$prop][] = "$prop Length between $len_array[1] , $len_array[2]";
		}
	}


}
