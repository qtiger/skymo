<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<link href="/styles/normal.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
<div class="cnt">
<h1><?= $st["title"]?></h1>
</div>
</header>
<div class="cnt">
<? foreach ($mn["main"] as $m): ?>
<a href='<?= $m["url"]?>' class="btn"><?=$m["name"] ?></a> 
<? endforeach ?>
</div>
<hr>
<div class="cnt">
<? include $t->content ?>
</div>
<footer>
<div class="cnt">
<?= $st["ftr"] ?><br>
Version <?= _VERSION_ ?>
</div>
</footer>
</body>
</html>
