<?php
use Cama\InflusBundle\Entity\Attribut;
use Symfony\Component\HttpFoundation\Request;


class AttributFactory {
  protected $player = null;
  
  public function __construct(){
    
  }
  
  public function setPlayer($pid) {
    $this->player = $pid;
  }
  
  public function getPlayer() {
    return $this->player;
  }
  
  
  public function deleteAll(){
    if(empty($this->player)) return 0;
    // To do
  }
  
  public function createFromRequest(Request $request){
    if(empty($this->player)) return 0;
    // To do
  }
  
}
