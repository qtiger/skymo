<?php
$changes = false;

/*function setfld($fld, $type) {
  global $t, $changes;

  if (array_key_exists($fld,$_POST)) {
    if ($_POST[$fld] == "" && array_key_exists($fld, $t->sf[_PAGETAG_][$t->pgurl])) {
      unset($t->sf[_PAGETAG_][$t->pgurl][$fld]);
      $changes = true;
      }
    else {
      $s = skymo::stringOK ($_POST[$fld], $type);
      if ($s) {
        $t->sf[_PAGETAG_][$t->pgurl][$fld] = $_POST[$fld];
        $changes = true;
        }
      }
    }
  }

function write() {
    global $changes, $t, $siteFile;
     
    if ($changes) {
      $t->msg="Changed";
      $j = str_replace("},","},\n",json_encode($t->sf,128));
      if ($j)
        { $t->msg="Written";
        file_put_contents ($siteFile, $j);
        }
      }
    } */

$t->msg = "Ready";
if (array_key_exists(_ADMPAR_,$q)) {
  $t->sitepg = $t->sf[_PAGETAG_][$q[_ADMPAR_]];
  if (!$t->sec->viewPage($t->sitepg))
    skymo::http403();
  else {
    $t->msg = "Set";
    $t->pgurl = $q[_ADMPAR_];
    $t->flds = skymo::getJson(_FLDDIR_ . _PAGETAG_ . ".json");

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
      $changed = false;
      $t->msg="Posted";
      foreach ($t->flds as $fld) {
        if (array_key_exists($fld["tag"], $t->sf[_PAGETAG_][$t->pgurl]))
          $ret = skymo::setfld($fld["tag"],$fld["type"]);
          if ($ret) $changed = true;
        }
      if ($changed) skymo::write();
      }
    }
  }
?>
