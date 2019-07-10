<?php

    class Event{

        private $id;
        private $name;
        private $locations;
        private $date;
        private $date_start;
        private $date_end;
        private $details;
        private $email_contact;
        private $count_clicks;
        private $category;
        private $link_info;        
        private $link_tickets;
        private $photo;
        private $id_company;
        private $qr;

        public function __construct(
            $id = null,
            $name = null,
            $locations = null,
            $date = null,
            $date_start = null,
            $date_end = null,
            $details = null,
            $email_contact = null,
            $count_clicks = null,
            $category = null,
            $link_info = null,
            $link_tickets = null,
            $photo = null,
            $id_company = null,
            $qr = null
        ){

            $this->id = $id;
            $this->name = $name;
            $this->locations = $locations;
            $this->date = $date;
            $this->date_start = $date_start;
            $this->date_end = $date_end;
            $this->details = $details;
            $this->email_contact = $email_contact;
            $this->count_clicks = $count_clicks;
            $this->category = $category;
            $this->link_info = $link_info;
            $this->link_tickets = $link_tickets;
            $this->photo = $photo;
            $this->id_company = $id_company;
            $this->qr = $qr;
            
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
    
        public function getLocation() {
            return $this->locations;
        }
    
        public function setLocation($locations) {
            $this->locations = $locations;
            return $this;
        }
    
        public function getDate() {
            return $this->date;
        }
    
        public function setDate($date) {
            $this->date = $date;
            return $this;
        }
    
        public function getDateStart() {
            return $this->date_start;
        }
    
        public function setDateStart($date_start) {
            $this->date_start = $date_start;
            return $this;
        }
    
        public function getDateEnd() {
            return $this->date_end;
        }
    
        public function setDateEnd($date_end) {
            $this->date_end = $date_end;
            return $this;
        }
    
        public function getDetails() {
            return $this->details;
        }
    
        public function setDetails($details) {
            $this->details = $details;
            return $this;
        }
    
        public function getEmailContact() {
            return $this->email_contact;
        }
    
        public function setEmailContact($email_contact) {
            $this->email_contact = $email_contact;
            return $this;
        }
    
        public function getCountClicks() {
            return $this->count_clicks;
        }
    
        public function setCountClicks($count_clicks) {
            $this->count_clicks = $count_clicks;
            return $this;
        }
    
        public function getCategory() {
            return $this->category;
        }
    
        public function setCategory($category) {
            $this->category = $category;
            return $this;
        }
    
        public function getLinkInfo() {
            return $this->link_info;
        }
    
        public function setlinkInfo($link_info) {
            $this->link_info = $link_info;
            return $this;
        }
    
        public function getLinkTickets() {
            return $this->link_tickets;
        }
    
        public function setLinkTickets($link_tickets) {
            $this->link_tickets = $link_tickets;
            return $this;
        }
    
        public function getPhoto() {
            return $this->photo;
        }
    
        public function setPhoto($photo) {
            $this->photo = $photo;
            return $this;
        }
    
        public function getIdCompany() {
            return $this->id_company;
        }
    
        public function setIdCompany($id_company) {
            $this->id_company = $id_company;
            return $this;
        }
    
        public function getQR() {
            return $this->qr;
        }
    
        public function setQR($qr) {
            $this->qr = $qr;
            return $this;
        }

    }

?>