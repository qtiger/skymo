<h2><?= $pg["title"]?> - <?= $t->sitepg['title'] ?></h2>
<form>
<label>URL</label><br>
<input type="text" value ="<?= $t->pgurl ?>" name="url"><br>
<? foreach($t->flds as $p): ?>
  <label><?= $p["name"] ?></label><br>
  <input type="text" value="<?= $t->sitepg[$p['tag']] ?>" name=""> <?= $t->eBtn($t->sitepg[$p['tag']],$p['tag']) ?><br>
<? endforeach?>
<input type="submit" value="Save">
</form>
<br>
