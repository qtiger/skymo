<h2><?= $pg["title"] . " - " . $t->tplname ?></h2>
<form action="/tpl/<?= $t->tplname ?>" method="POST">
<textarea rows="8" cols="100" name="tpl" id="code"><?= $t->tpl ?></textarea><br>
<input type="submit" value="Preview" name="PreBtn">
<input type="submit" value="Save" name="SaveBtn">
</form>
<p><?= $t->err ?></p>