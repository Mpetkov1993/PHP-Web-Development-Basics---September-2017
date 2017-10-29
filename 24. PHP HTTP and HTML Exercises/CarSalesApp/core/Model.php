<?php
abstract class Model
{
	protected $table = null;
	protected $db    = null;
		
	public function __construct($db){
		$this->db = $db;
	}

}