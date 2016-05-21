<?php namespace simple_mvc;

class User_model extends Model{


	protected $table = 'users';

	// protected $fillable = ['email','firstname','lastname'];
	public $timestamp = ['created_at','updated_at']; // timestamps for this table


	// public function __construct(){
	// 	echo "model loaded";
	// }



}
