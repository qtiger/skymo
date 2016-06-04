<h2><?= $pg["title"]?> - <?= $t->sitepg['title'] ?></h2>
<?= $t->msg ?><br>
<form action="/page/<?= $t->pgurl ?>" method="post">
<label>URL</label><br>
<input type="text" value ="<?= $t->pgurl ?>" name="url"><br>
<? foreach($t->flds as $p): ?>
  <? if ($t->sec->viewPage($p)): ?>
  <label><?= $p["name"] ?></label><br>
  <? if (array_key_exists($p['tag'],$t->sitepg)): ?>
  <input type="text" value="<?= $t->sitepg[$p['tag']] ?>" name="<?= $p['tag'] ?>"> <?= $t->eBtn($t->sitepg[$p['tag']],$p) ?><br>
  <? else: ?>
  <input type="text" value="" name="<?= $p['tag'] ?>"><br>
  <? endif?>
  <? endif ?>
<? endforeach?>
<input type="submit" value="Save">
</form>
<br>
