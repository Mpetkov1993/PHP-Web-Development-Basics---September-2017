<?php
abstract class Controller{
	
	protected $db    = null;
	protected $input = null;
	
	public function __construct($db){
		$this->db = $db;
		if(isset($_GET['input'])){
			$this->input = $_GET['input'];
		}
	}
	
	abstract public function main();

}