<?php
define (_VERSION_, "v0.1.0");

# Prefix if URL is not at site root. eg if
# http://example.com/skymo prefix would be
# /skymo/
define (_URLPREFIX_,"/");

# The following lines determine where skymo looks for its files
define(_JSONDIR_,"core/json/");
define(_CNTDIR_,"core/content/");
define(_SCRDIR_,"core/scripts/");
define(_TPLDIR_,"core/tpl/"); # Templates
define(_MDDIR_,"core/md/"); # Markdown
define(_FLDDIR_,"core/json/fields/"); # Field definitions
define(_LIBDIR_,"core/lib/"); # Field definitions

# The following lines determine the file extensions that skymo files use
# eg mytemplate.tpl
define(_TPLEXT_,".tpl");
define(_CNTEXT_,".htm");
define(_MDEXT_,".md");

# The page tag determines the json tag that skymo looks for in the site
# file for the list of web pages in the site
define(_PAGETAG_,"page");

# The url parameters
define (_PAGEPAR_,"p");
define (_ADMPAR_,"p2");

# How long to stay logged in if inactive
define (_LOGINTIMEOUT_,600); # 600 seconds = 10mins

# The site file is the json file which contains the website structure
$siteFile =_JSONDIR_ ."site.json";

# User levels define how much of the site a user can see
define (_USR_GUEST_,1); # Not logged in
define (_USR_REGISTERED_,5); # Registered but not yet approved
define (_USR_APPROVED_,10); # Normal logged in user
define (_USR_EDITOR_,15); # Logged in user with permission to edit content
define (_USR_ADMIN_,20); # Logged in with all permisions
?>
