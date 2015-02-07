<?php
namespace Itp\Music;
#"__a__" gets the whole directory name
// require __DIR__ . '/vendor/autoload.php';


use \Itp\Base\Database;
use \PDO;
class ArtistQuery extends Database{

	public function __construct(){
		// session_start();
		parent::__construct();
	}
	

	// Returns all artists from the artists table ordered by the artist name
	public function getAll(){
		$sql = "
			SELECT *
			FROM artists
			ORDER BY artist_name ASC
		";

		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$artistList = $statement->fetchAll(PDO::FETCH_OBJ);
		return $artistList;
	}

}