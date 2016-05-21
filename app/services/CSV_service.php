<?php namespace simple_mvc;
// name,phone,street
// Michal,506088156,Michalowskiego 41
// Marcin,502145785,Opata Rybickiego 1
// Piotr,504212369,Horacego 23
// Albert,605458547,Jan Pawła 67


class CSV_service extends Service{


	public function read_csv_file($file){
		$rows = file($file);
		foreach($rows as $row){
			$rec[] = str_getcsv($row);
		}
		return $rec;
	}

	public function save_csv_file($file,$fields){
		$fp = fopen($file, 'w+');
		foreach ($list as $fields) {
			fputcsv($fp, $fields);
		}
		fclose($fp);
	}


}
