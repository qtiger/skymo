<?php
$t->status ="ok";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($t->sec->login($_POST["un"],$_POST["pw"]))
    $t->status = "loggedin";
  else
    $t->status ="err";
  $t->msg = $t->sec->err();
  }
