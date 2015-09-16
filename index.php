<?php
require_once "config/localsettings.php";
require_once _SCRDIR_ . "templ.php";
require_once _SCRDIR_ . "skymo.php";
require_once _SCRDIR_ . "security.php";

if (isset($allowedHost)) if ($_SERVER[HTTP_HOST] != $allowedHost) {
  header("HTTP/1.0 404 Not Found");
  include "errors/404.html";
  exit();
  }

parse_str($_SERVER['QUERY_STRING'],$q);

$url="/";
if (array_key_exists(_ADMPAR_,$q)) {
  $j = skymo::getJson($admFile);
  $queryPage = _ADMPAR_;
  }
else {
  $j=skymo::getJson($siteFile);
  $queryPage = _PAGEPAR_;
  }

if (is_array($j)) {
  if (array_key_exists(_PAGETAG_,$j)) {
    if (array_key_exists($queryPage,$q)) $url = $q[$queryPage];
    if ($url=="") $url="/";
    if (array_key_exists($url,$j[_PAGETAG_])) {
      $t = new fTempl($j[_PAGETAG_][$url],$j["site"]);
      $t->q = $q;
      $t->sec = new userSecurity();
      if (array_key_exists("scr",$j[_PAGETAG_][$url]))
        include _SCRDIR_ . $j[_PAGETAG_][$url] ["scr"]. ".php";
      $t->show();
      }
    else {
      header("HTTP/1.0 404 Not Found");
      include "errors/404.html";
      exit();
      }
    }
  elseif (_DEBUG_) trigger_error ("Page element not found in site file");
  }
elseif (_DEBUG_) trigger_error("Error in Site file");
?>
