<?php
	echo '<h1>Movie Search Page</h1>';

?>

<form action="movies.php" method="post">
<label>Enter title:</label>
<input type="text" name="title" />
<input type="submit" value="Search" />
<input type="hidden" name="action" value="list" /><br>
</form>