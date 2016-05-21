<?php namespace simple_mvc;

class Validation{

	public function __construct($validated_data,$rules){
		$this->data = $validated_data;
		$this->rules = $rules;
		$this->evaluate_rules();
	}

	private function evaluate_rules(){
		foreach($this->rules as $prop=>$rules){
			$rule_array = explode('|',$rules);
			// var_export($rule_array);die;
			foreach($rule_array as $rule){
				if(trim($rule)=='required') $this->is_required($prop);
			}
		}
	}

	private function is_required($prop){
		if()
	}


}
