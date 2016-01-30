<h2><?= $pg["title"] . " - " . $t->mdname ?></h2>
<form action="/cnt/<?= $t->mdname ?>" method="POST">
<textarea rows="8" cols="100" name="md"><?= $t->md ?></textarea><br>
<input type="submit" value="Preview" name="PreBtn">
<input type="submit" value="Save" name="SaveBtn">
</form>
<p><?= $t->err ?></p>
<h3>Preview</h3>
<?= $t->preview ?>