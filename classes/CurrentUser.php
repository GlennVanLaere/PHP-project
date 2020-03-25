<?php
    include_once(__DIR__ . "/Db.php");

    class CurrentUser {
        private $currentEmail;
        private $currentFirstName;
        private $currentLastName;
        private $currentPassword;

        /**
         * Get the value of currentEmail
         */ 
        public function getCurrentEmail()
        {
                return $this->currentEmail;
        }

        /**
         * Set the value of currentEmail
         *
         * @return  self
         */ 
        public function setCurrentEmail($currentEmail)
        {
                if(empty($currentEmail)){
                    throw new Exception("Email cannot be empty");
                }

                $this->currentEmail = $currentEmail;

                return $this;
        }

        /**
         * Get the value of currentFirstName
         */ 
        public function getCurrentFirstName()
        {
                return $this->currentFirstName;
        }

        /**
         * Set the value of currentFirstName
         *
         * @return  self
         */ 
        public function setCurrentFirstName($currentFirstName)
        {
                $this->currentFirstName = $currentFirstName;

                return $this;
        }

        /**
         * Get the value of currentLastName
         */ 
        public function getCurrentLastName()
        {
                return $this->currentLastName;
        }

        /**
         * Set the value of currentLastName
         *
         * @return  self
         */ 
        public function setCurrentLastName($currentLastName)
        {
                $this->currentLastName = $currentLastName;

                return $this;
        }

        /**
         * Get the value of currentPassword
         */ 
        public function getCurrentPassword()
        {
                return $this->currentPassword;
        }

        /**
         * Set the value of currentPassword
         *
         * @return  self
         */ 
        public function setCurrentPassword($currentPassword)
        {
                if(empty($currentPassword)){
                    throw new Exception("Password cannot be empty");
                }

                $this->currentPassword = $currentPassword;

                return $this;
        }
    }
?>