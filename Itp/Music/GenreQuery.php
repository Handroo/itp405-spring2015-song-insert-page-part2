<?php

namespace Itp\Music;
#"__a__" gets the whole directory name
// require_once __DIR__ . '/Database.php';
// require __DIR__ . '/vendor/autoload.php';

use \Itp\Base\Database;
use \PDO;
class GenreQuery extends Database{

	public function __construct(){
		// session_start();
		parent::__construct();
	}
	

	// Returns all artists from the artists table ordered by the artist name
	public function getAll(){
		$sql = "
			SELECT *
			FROM genres
			ORDER BY genre ASC
		";

		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$genreList = $statement->fetchAll(PDO::FETCH_OBJ);
		return $genreList;
	}

}