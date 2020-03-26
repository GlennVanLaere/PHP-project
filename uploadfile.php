<?php
include_once(__DIR__ . "/Db.php");

class UploadFile{
  private $file;

  public function __construct($file) {
      $this->file = $file;
  }
   
}
