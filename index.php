<?php
require_once "config/localsettings.php";
require_once _SCRDIR_ . "templ.php";
require_once _SCRDIR_ . "skymo.php";
require_once _SCRDIR_ . "security.php";

if (isset($allowedHost)) if ($_SERVER[HTTP_HOST] != $allowedHost)
  skymo::http404();

parse_str($_SERVER['QUERY_STRING'],$q);

$url="/";
$j=skymo::getJson($siteFile);
$msg=skymo::getJson($msgFile);

$queryPage = _PAGEPAR_;

if (is_array($j)) {
  if (array_key_exists(_PAGETAG_,$j)) {
    if (array_key_exists($queryPage,$q)) $url = $q[$queryPage];
    if ($url=="") $url="/";
    if (array_key_exists($url,$j[_PAGETAG_])) {
      $sec = new userSecurity();
      if ($sec->viewPage($j[_PAGETAG_][$url])) {
        $t = new fTempl($j,$url,$sec);
        $t->q = $q;
        if (array_key_exists("scr",$j[_PAGETAG_][$url]))
          include _SCRDIR_ . $j[_PAGETAG_][$url] ["scr"]. ".php";
        $t->show();
        }
      else skymo::http403();
      }
    else skymo::http404();
    }
  elseif (_DEBUG_) trigger_error ("Page element not found in site file");
  }
elseif (_DEBUG_) trigger_error("Error in Site file");
?>
