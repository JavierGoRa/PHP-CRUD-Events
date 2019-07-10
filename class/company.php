<?php

    class Company{

        private $id;
        private $name;
        private $region;
        private $location;
        private $cif;
        private $email;
        private $password;

        public function __construct(
            $id = null,
            $name = null,
            $region = null,
            $location = null,
            $cif = null,
            $email = null,            
            $password = null
        ){
            $this->id = $id;
            $this->name = $name;
            $this->region = $region;
            $this->location = $location;
            $this->cif = $cif;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
            return $this;
        }
    
        public function getName() {
            return $this->name;
        }
    
        public function setName($name) {
            $this->name = $name;
            return $this;
        }

        public function getRegion() {
            return $this->region;
        }
    
        public function setRegion($region) {
            $this->region = $region;
            return $this;
        }
        
        public function getLocation() {
            return $this->location;
        }
    
        public function setLocation($location) {
            $this->location = $location;
            return $this;
        }

        
        public function getCif() {
            return $this->cif;
        }
    
        public function setCif($cif) {
            $this->cif = $cif;
            return $this;
        }

        
        public function getemail() {
            return $this->email;
        }
    
        public function setemail($email) {
            $this->email = $email;
            return $this;
        }

        
        public function getPassword() {
            return $this->password;
        }
    
        public function setPassword($password) {
            $this->password = $password;
            return $this;
        }
        
    }

?>