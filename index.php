<?php
require_once "config/localsettings.php";
require_once "scripts/templ.php";
require_once "scripts/skymo.php";

$j=skymo::getJson($siteFile);
if (is_array($j)) {
  if (array_key_exists(_PAGETAG_,$j)) {
    parse_str($_SERVER['QUERY_STRING'],$q);
    if (array_key_exists("p",$q)) $url = $q["p"];
    else $url ="/";
    if (array_key_exists($url,$j[_PAGETAG_])) {
      $t = new fTempl($j[_PAGETAG_][$url],$j["site"]);
      $t->show();
      }
    else echo "404; Page $url not found";
    }
  elseif (_DEBUG_) trigger_error ("Page element not found in site file");
  }
elseif (_DEBUG_) trigger_error("Site file not found");
?>
