<h2><?= $pg["title"]?></h2>
<table>
<tr><th colspan="2">Page: <?= $t->sitepg['title'] ?></th>
<tr><th>Field</th>
<th>Value</th></tr>
<tr><td>URL</td>
<td><?= $t->pgurl ?></td></tr>
<? foreach($t->flds as $p): ?>
  <tr><td><?= $p["name"] ?></td>
  <td><?= $t->sitepg[$p['tag']] ?></td></tr>
<? endforeach?>
</table>
<br>
