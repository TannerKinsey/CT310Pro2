
<div class="container text-center">
<h2>
	<a href="<?=Uri::create('index.php/orm/index'); ?>">Attractions</a>
	» Add
</h2>
<div class="h2Content">
	Add Attraction
	<form method="post">
		<label for="id">Attraction Name (STRING)</label>
		<input type="text" name="attractionName" />
		<br />
		<label for="id">Description (STRING)</label>
		<input type="text" name="description" />
		<br />
		<label for="id">Image Path (STRING)</label>
		<input type="text" name="imgPath" />
		<br />
		<input type="submit" value="Add Course" />
	</form>
</div>
</div>
