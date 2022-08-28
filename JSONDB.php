<?php
class JSONDB{
  private $fileName;
  private $array;

  public function __construct($fileName){
    $this->fileName = $fileName;
    if(file_exists($fileName)){
      $this->array = json_decode(file_get_contents($fileName), true);
    }
  }
  public function create($arr){
    $this->array[] = $arr;
  }
  public function read($prop, $val){
    if($this->array == null){
      return false;
    }
    foreach($this->array as $entry){
      if($entry[$prop] == $val){
        return $entry;
      }
    }
    return false;
  }
  public function update($prop, $val, $arr){
    foreach($this->array as $entry){
      if($entry[$prop] == $val){
        $entry = $arr;
      }
    }
  }
  public function delete($prop, $val){
    $i = 0;
    foreach($this->array as $entry){
      if($entry[$prop] == $val){
        array_splice($array, $i, 1);
      }
      $i++;
    }
  }
  public function flush(){
    file_put_contents($this->fileName, json_encode($this->array));
  }
}
?>