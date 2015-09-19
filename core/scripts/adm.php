<?php
$t->sf = skymo::getJson($siteFile);
if (array_key_exists(_ADMPAR_,$q)) {
  $t->pgurl = $q[_ADMPAR_];
  $t->sitepg = $t->sf[_PAGETAG_][$q[_ADMPAR_]];
  $t->flds = skymo::getJson(_FLDDIR_ . _PAGETAG_ . ".json");
  }
?>
