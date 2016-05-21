<?php
	if(!empty($messages['validation_msgs'])){
		echo "<ul class='alert alert-danger list'>";
		foreach($messages['validation_msgs'] as $key=>$val){
			echo "<li>$val[0]</li>";
		}
		echo "</ul>";
	}
	else if( isset($messages['success']) ){
		echo "<h4 class='alert alert-success'>";
		echo $messages['success'];
		echo "</h4>";
	}
	else if( isset($messages['info']) ){
		echo "<h4 class='alert alert-info'>";
		echo $messages['info'];
		echo "</h4>";
	}
?>
