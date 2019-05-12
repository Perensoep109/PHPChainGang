<?php

class DBCate
{


     //==Variables==//
     private $dbIndex;
     private $name;


     //==GettersandSetters==//
     //==Getters==//
     public function getDbIndex()
     {
         return $this->dbIndex;
     }
     public function getName()
     {
         return $this->name;
     }
     //==Setters==//
     //you cant change an catogory in the db so no setters here



}