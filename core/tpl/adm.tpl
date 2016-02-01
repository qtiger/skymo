<h2><?= $pg["title"]?></h2>
<table>
<tr><th>Page Title</th>
<th>URL</th></tr>
<? foreach($t->sf[_PAGETAG_] as $url=>$p): ?>
<? if ($t->sec->viewPage($p)): ?>
<tr><td><a href='page/<?= $url ?>'><?= $p["title"] ?></a></td>
  <td><?= $url ?></td></tr>
<? endif ?>
<? endforeach?>
</table>
<br>