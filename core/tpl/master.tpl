<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<link href="/styles/normal.css" rel="stylesheet" type="text/css">
<? if (isset ($t->codemirror)): ?>
<link rel="stylesheet" href="/codemirror/codemirror.css">
<script src="/codemirror/cm.js"></script>
<style type="text/css">.CodeMirror {border: 1px solid #135;}</style>
<script>
  function init() {
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
      lineNumbers: true,
      matchBrackets: true,
      mode: "application/x-httpd-php",
      indentUnit: 2,
      indentWithTabs: false
    });
  }
</script>
<? endif ?>
</head>
<? if (isset ($t->codemirror)):?>
<body onload="init()">
<? else :?>
<body>
<? endif ?>
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
Version <?= _VERSION_ ?><br>
<?= "TMO: " . $t->sec->tmo ?>
</div>
</footer>
</body>
</html>
