<?php
class error_msg{
  private $arr;
  
  public function __construct($args){
    $this->arr = ['OK' => true, errors => []];
    foreach($args as $arg){
      $this->arr[errors][$arg] = '';
    }
  }
  public function error($type, $err){
    $this->arr[errors][$type] = $err;
    $this->arr[OK] = false;
  }
  public function OK(){
    return $this->arr[OK];
  }
  public function json(){
    return json_encode($this->arr);
  }
}
?>