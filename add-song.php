<?php
	// require_once __DIR__ . '/ArtistQuery.php';
	// require_once __DIR__ . '/GenreQuery.php';
	// require_once __DIR__ . '/Song.php';
	require __DIR__ . '/vendor/autoload.php';


	use \Itp\Music\ArtistQuery;
	use \Itp\Music\GenreQuery;
	use \Itp\Music\Song;
	use \Symfony\Component\HttpFoundation\Session\Session;

	$artistQuery = new ArtistQuery();
	$artistList = $artistQuery->getAll(); 
	$genreQuery = new GenreQuery();
	$genreList = $genreQuery->getAll(); 
	$song = new Song();
	$session = new Session();
	$session->start();
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$price = $_POST['price'];
		$artist_id = $_POST['artist'];
		$genre_id = $_POST['genre'];

		$song->setTitle($title);
		$song->setPrice($price);
		$song->setArtistId($artist_id);
		$song->setGenreId($genre_id);
		$song->save();
		$session->getFlashBag()->add('contact-success', 'The song '. $song->getTitle() . ' with an ID of '. $song->getId() .' was inserted successfully!');
    	$session->getFlashBag()->add('contact-success', 'Thank you!');
		header('Location:add-song.php');
		exit;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Song</title>
</head>
<body>

<?php foreach($session->getFlashBag()->get('contact-success') as $message) : ?>
<p>
    <?php echo $message ?>
</p>
<?php endforeach ?>

<form action="add-song.php" method="post">
	Title: <input type="text" name ="title" >
	Price: <input type="text" name = "price" >

	<select name="artist">
		<?php foreach($artistList as $artist) : ?>
			<?php echo " <option value=$artist->id> $artist->artist_name </option>"?>
		<?php endforeach ?>
	</select>
	<select name ="genre">
		<?php foreach($genreList as $genre) : ?>
			<?php echo " <option value=$genre->id> $genre->genre </option>"?>
		<?php endforeach ?>
	</select>
	<input type="submit" value ="Add" name="submit">
</form>




</body>
</html>