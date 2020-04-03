<?php
    include_once(__DIR__ . "/Db.php");
    
    class User{
        private $email;
        private $category;
        private $searchTerm;

        public function search() {
            $email = $this->getEmail();
            $searchTerm = $this->getSearchTerm();
            $category = $this->getCategory();

            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` != :email && `$category` = :searchTerm");
            $statement->bindValue(':email', $email);
            $statement->bindValue(':searchTerm', $searchTerm);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }        

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
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of category
         */ 
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }

        /**
         * Get the value of searchTerm
         */ 
        public function getSearchTerm()
        {
                return $this->searchTerm;
        }

        /**
         * Set the value of searchTerm
         *
         * @return  self
         */ 
        public function setSearchTerm($searchTerm)
        {
                $this->searchTerm = $searchTerm;

                return $this;
        }
    }

?>