<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{font-family:sans-serif;margin:0}
header {background:#235;color:#fff;}
h1 {font-size:1.3em;padding:8px;margin-top:0}
a{background:#235;color:#fff;padding:3px 9px;text-decoration:none;border-radius:5px;font-weight:bold;}
.cnt{width:96%;margin:auto;}
footer{font-size:.8em;background:#235;color:#fff;padding:10px 0;}
@media(min-width:1000px){
.cnt{width:960px}}
</style>
</head>
<body>
<header>
<div class="cnt">
<h1><?= $st["title"]?></h1>
</div>
</header>
<div class="cnt">
<? foreach ($t->mn as $m): ?>
<a href='<?= $m["url"]?>'><?=$m["name"] ?></a> 
<? endforeach ?>
<? include $t->content ?>
</div>
<footer>
<div class="cnt">
<?= $st["ftr"] ?>
</div>
</footer>
</body>
</html>
