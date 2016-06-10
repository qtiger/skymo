<?php
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
        if (array_key_exists($fld["tag"], $_POST))
          $ret = skymo::setfld($fld["tag"], $_POST[$fld["tag"]], $fld["type"]);
          if ($ret) $changed = true;
        }
      if ($changed)
        if (skymo::write())
          $t->msg="Changes saved";;
      }
    }
  }
?>