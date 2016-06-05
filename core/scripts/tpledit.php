<?php
$t->codemirror = true;

$fn = _TPLDIR_ . $q[_ADMPAR_] . _TPLEXT_;

$t->tplname = $q[_ADMPAR_];
$t->err = "";

if (file_exists($fn)) {
  $t->tpl = htmlentities(file_get_contents($fn));

  if ($_SERVER["REQUEST_METHOD"]=="POST" && array_key_exists("tpl",$_POST)) {
    $t->tpl=htmlentities($_POST["tpl"]);

    if (array_key_exists("SaveBtn",$_POST)) {
      $st1 = file_put_contents($fn,$_POST["tpl"]);

      if ($st1 === false) $t->err = $msg["SaveErr"];
      else  $t->err = $msg["SaveOk"];
    }
  }
}
