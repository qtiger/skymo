<?php
$t->status ="ok";

if ($_SERVER["REQUEST_METHOD"] == "POST")
  $t->status ="err";
