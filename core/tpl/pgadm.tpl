<h2><?= $pg["title"]?> - <?= $t->sitepg['title'] ?></h2>
<?= $t->msg ?><br>
<form action="/page/<?= $t->pgurl ?>" method="post">
<label>URL</label><br>
<input type="text" value ="<?= $t->pgurl ?>" name="url"><br>
<? foreach($t->flds as $p): ?>
  <? if ($t->sec->viewPage($p)): ?>
  <label><?= $p["name"] ?></label><br>
  <input type="text" value="<?= $t->sitepg[$p['tag']] ?>" name="<?= $p['tag'] ?>"> <?= $t->eBtn($t->sitepg[$p['tag']],$p) ?><br>
  <? endif ?>
<? endforeach?>
<input type="submit" value="Save">
</form>
<br>
