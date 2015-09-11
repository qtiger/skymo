<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<style>
body{font-family:'Roboto', sans-serif;margin:0}
header {background:#235;color:#fff;}
h1 {font-size:1.5em;padding:8px;margin:0 0 8px 0;font-family:'Fredoka One';font-weight:normal;}
h2 {margin:.6em 0 0 0;}
h3{border-bottom:1px solid #235;}
a{text-decoration:none;font-weight:bold;color:#457;}
footer a{color:#ccc}
a.btn:link,a.btn:visited{background:#235;color:#fff;padding:3px 9px;border-radius:5px;}
a.btn:hover{background:#457;}
a.btn:active{background:#457;}
.cnt{width:96%;margin:auto;}
footer{font-size:.8em;background:#235;color:#fff;padding:10px 0;}
@media(min-width:1000px){
.cnt{width:960px}}
table{border-collapse:collapse; width:100%}
th{background:#235;color:#fff;text-align:left;}
th,td{border:1px solid #235;padding:4px 12px;}
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
