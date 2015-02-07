<?php
namespace Itp\Music;
#"__a__" gets the whole directory name
// require_once __DIR__ . '/Database.php';
// require __DIR__ . '/vendor/autoload.php';
use \Itp\Base\Database;
use \PDO;
class Song extends Database{

	private $title;
	private $artist_id;
	private $genre_id;
	private $price;

	public function __construct(){
		// session_start();
		parent::__construct();
	}

	// - sets a title instance property
	public function setTitle($title){
		$this->title = $title;
	}
	// - sets an artist_id instance property
	public function setArtistId($id){
		$this->artist_id = $id;
	}
	// - sets a genre_id instance property
	public function setGenreId($genre_id) {
		$this->genre_id = $genre_id;
	}
	//  - sets a price
	public function setPrice($price){
		$this->price = $price;
	}
	// - performs the insert
	public function save(){
		date_default_timezone_set('America/Los_Angeles');
		$timestamp = date('Y-m-d H:i:s');
		$sql = "
				INSERT INTO songs(title, artist_id, genre_id,price, added, created_at, updated_at)
				VALUES (?,?,?,?,?,?,?)
		";

		$statement = static::$pdo->prepare($sql);
		$statement->bindParam(1,$this->title);
		$statement->bindParam(2,$this->artist_id);
		$statement->bindParam(3,$this->genre_id);
		$statement->bindParam(4,$this->price);
		$statement->bindParam(5,$timestamp);
		$statement->bindParam(6,$timestamp);
		$statement->bindParam(7,$timestamp);
		$statement->execute();
	} 
	//  - returns the song title
	public function getTitle(){
		return $this->title;
	}
	//  - returns the id column of this song in the database (more on this below)
	public function getId(){
		return static::$pdo->lastInsertId();
	}
	

}