<?php
include "Application_model.php";
class IndexModel extends ApplicationModel{
    public $dataase;
    public function __construct(Database $database ){
        $this->dataase = $database;
    }

}