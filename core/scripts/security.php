<?php
if (!defined('PASSWORD_DEFAULT'))  require_once _LIBDIR_ . "password/password.php";

define (_HASHROUNDS_,20);

class userSecurity
  {
  private static $USER_SESSIONNAME = _SESSIONCOOKIE_;
  private static $USER_UIDCOOKIE = _UIDCOOKIE_;

  private $loginStatus='unset';
  private $loginLevel=1;
  
  private $pwArr = null;
  private $errCode=0;
  private $errStr = array("Success","Password file error","Can't finder user array in password file","Unknown user","Incorrect Password");

  public function pwHash($input, $rounds = _HASHROUNDS_)
    {
    $options = array('cost' => $rounds);
    return password_hash($input, PASSWORD_BCRYPT, $options);
    }

  public function pwVerify ($input,$hash)
    {
    return password_verify($input,$hash);
    }

  public function userSecurity()
    {
    session_name(self::$USER_SESSIONNAME);
    session_start();
    session_regenerate_id();
    
    if (!array_key_exists("loginStatus",$_SESSION))
      {
      $_SESSION['loginStatus']="not-logged-in";
      $_SESSION['loginLevel'] = 1;
      }
    else {
      if (($_SESSION["time"] - time()) <0)
        $this->logout();
      else $_SESSION["time"] = time() + _LOGINTIMEOUT_;
      }
    $this->loginStatus = $_SESSION["loginStatus"];
    $this->loginLevel = $_SESSION['loginLevel'];
    }
  
  public function isLoggedIn()
    {
    if ($this->loginStatus == "true")
      return true;
    else
      return false;
    }
    
   public function checkLogin($un, $pw)
     {
     $res = false;

     $j = skymo::getJson(_PASSWD_);
     if ($j) {
       if (array_key_exists("users",$j)) {
         $this->pwArr = $j["users"];
         if (array_key_exists($un,$this->pwArr)) {
           $res = $this->pwVerify($pw,$this->pwArr[$un]["pw"]);
           if (!$res) $this->errCode=4;
           }
         else $this->errCode=3;
         }
       else $this->errCode=2;
       }
     else $this->errCode=1;
     return $res;
     } 
   
   public function level ($un)
     {
     $level = 1;

     if (array_key_exists($un,$this->pwArr))
       if (array_key_exists("lvl",$this->pwArr[$un]))
         $level = $this->pwArr[$un]["lvl"];
     return $level;
     }

   public function login($un, $pw)
     {
     // Destroy any current session before 
     // creating a new one
     $this->logout();

     $this->loginStatus = "false";
     $this->loginLevel = 1;
     
     if ($this->checkLogin($un, $pw))
       {
       $this->loginStatus = "true";
       $this->loginLevel = $this->level($un);
       $_SESSION['user'] = sha1($un);
       $_SESSION["time"] = time() + _LOGINTIMEOUT_;
       $this->errCode =0;
       }

     $_SESSION["loginStatus"] = $this->loginStatus;
      $_SESSION['loginLevel'] = $this->loginLevel;
      
      if ($this->loginStatus == "true")
        return true;
      else
        return false;
     }
   
   public function isCurUser($un)
     {
     if (sha1($un) == $_SESSION['user']) return true;
     else return false;
     }
   
   public function logout()
     {
     if ($this->isLoggedIn()) {
       $_SESSION = array();
       session_destroy();
       }
     }
     
   public function userlevel()
     {
     return $this->loginLevel;
     }

   public function err()
     {
     return $this->errStr[$this->errCode];
     }
}
?>
