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

  public static function setfld($fld, $type) {
    global $t;

    if (array_key_exists($fld,$_POST)) {
      if ($_POST[$fld] == "" && array_key_exists($fld, $t->sf[_PAGETAG_][$t->pgurl]))
        unset($t->sf[_PAGETAG_][$t->pgurl][$fld]);
      else {
        $s = skymo::stringOK ($_POST[$fld], $type);
        if ($s)
          $t->sf[_PAGETAG_][$t->pgurl][$fld] = $_POST[$fld];
        }
      }
    }

  public static function write() {
    global $t, $siteFile;
    
    $ret = false;
    $j = str_replace("},","},\n",json_encode($t->sf,128));
    if ($j)
      $ret = file_put_contents ($siteFile, $j);

    return $ret;
    }
  }
?>
