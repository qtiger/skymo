<?php
class skymo {
  public static function getJson($f) {
    if (file_exists($f))
     return json_decode(file_get_contents($f),true);
    else {
      if (_DEBUG_) trigger_error("File $f not found");
      return null;
      }
    }

  public static function stringOK($s,$type) {
    $ret = false;
    if ($type == 'f' && !preg_match('/[^A-Za-z0-9\-_]/', $s))
        $ret = $s;
    elseif ($type == 's' && !preg_match('/[^A-Za-z0-9\-_\' &;]/', $s))
        $ret = $s;
    if ($type == 'n' && !preg_match('/[^0-9\-]/', $s))
        $ret = $s;
    return $ret;
  }

  public static function setfld($fld, $value, $type) {
    global $t;
    $changed = false;

    if ($value == "" && array_key_exists($fld, $t->sf[_PAGETAG_][$t->pgurl]))
      unset($t->sf[_PAGETAG_][$t->pgurl][$fld]);
    else {
      $s = skymo::stringOK ($value, $type);
      if ($s) {
        $t->sf[_PAGETAG_][$t->pgurl][$fld] = $value;
        $changed = true;
      }
    }

    return $changed;
  }

  public static function write() {
    global $t, $siteFile;
    $ret = false;
    
    $j = str_replace("},","},\n",json_encode($t->sf,128));
    if ($j)
      $ret = file_put_contents ($siteFile, $j);

    return $ret;
  }

  public static function http404() {
    header("HTTP/1.0 404 Not found");
    include "errors/404.html";
    exit();
    }

  public static function http403() {
    header("HTTP/1.0 403 Forbidden");
    include "errors/403.html";
    exit();
    }
  }
?>
