<?php
$t->sf = skymo::getJson($siteFile);
if (array_key_exists(_PAGEPAR_,$q)) {
  $t->pgurl = $q[_PAGEPAR_];
  $t->sitepg = $t->sf[_PAGETAG_][$q[_PAGEPAR_]];
  $t->flds = skymo::getJson(_FLDDIR_ . _PAGETAG_ . ".json");
  }
?>
