<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<style>
body{font-family:'Roboto', sans-serif;margin:0}
header {background:#235;color:#fff;}
h1 {font-size:1.5em;padding:8px;margin-top:0;font-family:'Fredoka One';font-weight:normal;}
a{text-decoration:none;font-weight:bold;color:#ccc;}
a.btn{background:#235;color:#fff;padding:3px 9px;border-radius:5px;}
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
<? foreach ($mn["main"] as $m): ?>
<a href='<?= $m["url"]?>' class="btn"><?=$m["name"] ?></a> 
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
