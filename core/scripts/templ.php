<?php
class fTempl {
  private $tmpl="master.tpl";
  private $sFile = array();
  public $pg=array();
  public $st=array();
  public $mn=array();
  public $content="";
  public $sec;

  function __construct($sFile,$url,$sec) {
    $this->sec = $sec;
    $this->sFile = $sFile;                  
    $this->pg = $sFile[_PAGETAG_][$url];                  
    $this->st = $sFile["site"];
    if (array_key_exists("json",$this->pg)) {
      $json = skymo::getJson(_JSONDIR_ . $this->pg["json"] . ".json");
      if (is_array($json)) {
        foreach ($json as $item=>$val)
          $this->{$item}=array_reverse($val);
        }
      }
    }

  private function buildMenu() {
    foreach ($this->sFile[_PAGETAG_] as $url=>$p) {
      if ($this->sec->viewPage($p, true)) {
        if (array_key_exists("menu",$p)) {
          if (array_key_exists("mname",$p)) $nm = $p['mname'];
          elseif (array_key_exists("title",$p)) $nm = $p['title'];
          else $nm = $url;
          $this->mn[$p["menu"]][]["name"] = $nm;
          $index = count($this->mn[$p["menu"]]) -1;
          if ($url != "/") $url = _URLPREFIX_ . $url;
          $this->mn[$p["menu"]][$index]["url"] = $url;
          }
        }
      }
    }

  public function eBtn($name, $tag) {
    $ret ="";
    if ($name != "")
      if ($tag == "tpl" || $tag == "cnt" || $tag == "json" || $tag == "scr" || $tag == "menu")
        $ret = "<a href='?adm=file&nm=$name&tag=$tag'>Edit</a>";

    return $ret;
    }

  public function get($file) {
    if (file_exists(_CNTDIR_ . $file . _CNTEXT_))
      include (_CNTDIR_ . $file . _CNTEXT_);
    elseif (_DEBUG_) echo "Get: Content file $file not found";
    }

  public function show() {
    $this->buildMenu();
    $t=$this;
    $st=$t->st;
    $pg=$t->pg;
    $mn=$t->mn;
    if (array_key_exists("tpl",$t->pg))
      $t->content = _TPLDIR_ . $t->pg["tpl"] . _TPLEXT_;
    elseif (array_key_exists("cnt",$t->pg))
      $t->content = _CNTDIR_ . $t->pg["cnt"] . _CNTEXT_;
    if ($t->content=="" || file_exists($t->content))
      {
      ob_start();
      include _TPLDIR_ . $this->tmpl;
      ob_end_flush();
      }
    elseif (_DEBUG_) trigger_error ("tpl {$t->content} not found");
    }
  }
