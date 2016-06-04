<?php
require_once "core/lib/parsedown/Parsedown.php";

$fn = _MDDIR_ . $q[_ADMPAR_] . _MDEXT_;
$hfn = _CNTDIR_ . $q[_ADMPAR_]  . _CNTEXT_;

$t->err = "";

$t->mdname = $q[_ADMPAR_];
if (file_exists($fn)) {
  $t->md = file_get_contents($fn);

  $p = new Parsedown();
  
  if ($_SERVER["REQUEST_METHOD"]=="POST" && array_key_exists("md",$_POST)) {
    $t->md=$_POST["md"];
    $html = $p->text($t->md);
    if (array_key_exists("SaveBtn",$_POST)) {
      $st1 = file_put_contents($fn,$t->md);
      $st2 = file_put_contents($hfn,$html);

      if ($st1 === false && $st2  === false) $t->err = $msg["SaveErr"];
      else  $t->err = $msg["SaveOk"];
    }
  }

  $t->preview = $p->text($t->md);
}
