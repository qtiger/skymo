<h2><?= $pg["title"] ?></h2>
<? foreach ($t->items as $i): ?>
<h3><?= $i["title"] ?></h3>
<?= $t->get($i["file"]) ?>
<? endforeach ?>
