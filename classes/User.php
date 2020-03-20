<?php 

    class User{
        private $email;
        private $fullName;
        private $password;

        



        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            if(empty($email)){
                throw new Exception("email cannot be empty");
            }
            
            $this->email = $email;

            return $this;
        }

        /**
         * Get the value of fullName
         */ 
        public function getFullName()
        {
            return $this->fullName;
        }

        /**
         * Set the value of fullName
         *
         * @return  self
         */ 
        public function setFullName($fullName)
        {
            if(empty($fullName)){
                throw new Exception("Full name cannot be empty");
            }

            $this->fullName = $fullName;

            return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
            if(empty($password)){
                throw new Exception("password cannot be empty");
            }

            $this->password = $password;

            return $this;
        }
    }