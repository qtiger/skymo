<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{font-family:sans-serif;margin:0}
h1 {background:#235;color:#fff;font-size:1.3em;padding:8px;margin:0}
.cnt{width:96%;margin:auto;}
footer{font-size:.8em;background:#235;color:#fff;padding:10px 0;}
</style>
</head>
<body>
<h1><?= $st["title"]?></h1>
<? include $t->content ?>
<footer>
<div class="cnt">
<?= $st["ftr"] ?>
</div>
</footer>
</body>
</html>
