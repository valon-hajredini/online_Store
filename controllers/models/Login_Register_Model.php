<?php
include "Application_model.php";
class LoginRegisterModel extends ApplicationModel{
    public $dataase;
    public function __construct(Database $database ){
        $this->dataase = $database;
    }

   


}

