<h2>Admin</h2>
<table>
<tr><th>URL</th>
<th>Content</th>
<th>Fields</th>
<th>Template</th></tr>
<? foreach($t->sf["pages"] as $url=>$p): ?>
  <tr><td><?= $url ?></td>
  <td><?= $p["cnt"] ?></td>
  <td><?= $p["json"] ?></td>
  <td><?= $p["tpl"] ?></td></tr>
<? endforeach?>
</table>
<br>
