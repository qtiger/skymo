<?php
# The following lines determine where skymo looks for its files
define(_JSONDIR_,"core/json/");
define(_CNTDIR_,"core/content/");
define(_SCRDIR_,"core/scripts/");
define(_TPLDIR_,"core/tpl/");

# The following lines determine the file extensions that skymo files use
# eg mytemplate.tpl
define(_TPLEXT_,".tpl");
define(_CNTEXT_,".htm");
define(_MDEXT_,".md");

# The page tag determines the json tag that skymo looks for in the site
# file for the list of web pages in the site
define(_PAGETAG_,"pages");

# The site file is the json file which contains the website structure
$siteFile =_JSONDIR_ ."site.json"; ?>
