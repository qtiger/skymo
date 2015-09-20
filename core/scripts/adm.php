<?php
$changes = false;

function setfld($fld) {
  global $t, $changes;

  if (array_key_exists($fld,$_POST)) {
    $s = skymo::stringOK ($_POST[$fld]);
    if ($s) {
      $t->sf[_PAGETAG_][$t->pgurl][$fld] = $_POST[$fld];
      $changes = true;
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
    }

$t->sf = skymo::getJson($siteFile);
$t->msg = "Ready";
if (array_key_exists(_ADMPAR_,$q)) {
  $t->msg = "Set";
  $t->pgurl = $q[_ADMPAR_];
  $t->flds = skymo::getJson(_FLDDIR_ . _PAGETAG_ . ".json");

  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $t->msg="Posted";
    foreach ($t->flds as $fld)
      setfld($fld["tag"]);
    write();
    }
  $t->sitepg = $t->sf[_PAGETAG_][$q[_ADMPAR_]];
  }
?>
