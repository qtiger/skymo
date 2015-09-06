<?php
require_once "config/localsettings.php";
require_once "scripts/templ.php";
require_once "scripts/skymo.php";

$j=skymo::getJson($siteFile);
if ($j) {
  if (array_key_exists("/",$j["pages"])) {
    parse_str($_SERVER['QUERY_STRING'],$q);
    if (array_key_exists("p",$q)) $url = $q["p"];
    else $url ="/";
    if (array_key_exists($url,$j["pages"])) {
      $t = new fTempl($j["pages"][$url],$j["site"]);
      $t->show();
      }
    else echo "404; Page $url not found";
    }
  elseif (_DEBUG_) trigger_error ("Page not found");
  }
elseif (_DEBUG_) trigger_error("Site file not found");
?>
