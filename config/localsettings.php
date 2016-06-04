<?php
require_once "config/settings.php";

# confidentialsettings.php includes any settings that are not
# appropriate to store on GitHub
if (file_exists("config/confidentialsettings.php"))
  include "config/confidentialsettings.php";

# Comment out or remove this line in production enviroments to supress
# error messages being displayed to the user
define("_DEBUG_",true);

# location of the password file
#define(_PASSWD_,"core/adm/blank_acc.json"); # Usernames and passwords
# If on shared hosting $allowedHost can be used to ensure that 
# skymo can only be accessed from the correct URL eg setting
# $allowedHost = subdomain.mydomain.com
# prevents access from mydomain.com/subdomain
# $allowedHost = skymo.example.com
?>
