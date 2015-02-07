<?php

namespace Itp\Base;
use \PDO;
class Database{
	private $host = 'itp460.usc.edu';
	private $dbname = 'music';
	private $user = 'student';
	private $password = 'ttrojan';
	#only use 1 db connection across all classes
	protected static $pdo;

	public function __construct(){
		#makes sure only one ever gets created
		if(!static::$pdo){
			$connectionString = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
			static::$pdo = new PDO($connectionString, $this->user, $this->password);
		}
	}
}