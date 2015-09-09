<?php
class fTempl {
  private $tmpl="master.tpl";
  private $path=_TPLDIR_;
  public $pg=array();
  public $st=array();
  public $mn=array();
  public $content="";

  function __construct($page,$site) {
  $this->pg = $page;                  
  $this->st = $site;
  if (array_key_exists("menu",$this->pg))
    $this->mn = skymo::getJson(_JSONDIR_ . $this->pg["menu"] . ".json");
  if (array_key_exists("json",$this->pg)) {
    $json = skymo::getJson(_JSONDIR_ . $this->pg["json"] . ".json");
    if (is_array($json)) {
      foreach ($json as $item=>$val)
        $this->{$item}=array_reverse($val);
      }
    }
  }

  function get($file) {
    if (file_exists(_CNTDIR_ . $file . _CNTEXT_))
      include (_CNTDIR_ . $file . _CNTEXT_);
    elseif (_DEBUG_) echo "Get: Content file $file not found";
    }

  function show() {
    $t=$this;
    $st=$t->st;
    $pg=$t->pg;
    $mn=$t->mn;
    if (array_key_exists("tpl",$t->pg))
      $t->content = $t->pg["tpl"] . _TPLEXT_;
    if ($t->content=="" || file_exists($this->path . $t->content))
      {
      ob_start();
      include $this->path . $this->tmpl;
      ob_end_flush();
      }
    elseif (_DEBUG_) trigger_error ("tpl {$t->content} not found");
    }
  }