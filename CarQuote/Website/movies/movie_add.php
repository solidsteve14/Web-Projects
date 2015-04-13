<?php
	echo '<h1>Movie Search Page</h1>';

?>

<form action="movie_add_new.php" method="post">
<label>Enter Title:</label>
<input type="text" name="title" required /><br>
<label>Enter Year:</label>
<input type="text" name="year" required /><br>
<label>Enter Length:</label>
<input type="text" name="length" /><br>
<label>Enter Genre:</label>
<input type="text" name="genre" /><br>
<label>Enter Studio Name:</label>
<input type="text" name="studio" /><br>
<input type="submit" value="Add Movie" />
</form>