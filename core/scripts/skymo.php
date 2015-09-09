<?php
class skymo {
public static function getJson($f) {
  if (file_exists($f))
   return json_decode(file_get_contents($f),true);
  else return null;
  }
}
?>
