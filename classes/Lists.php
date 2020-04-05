<?php
    include_once(__DIR__ . "/Db.php");
    
    class User{
        private $currentEmail;
        private $category;
        private $searchTerm;

        public function search() {
            $currentEmail = $this->getCurrentEmail();
            $searchTerm = $this->getSearchTerm();
            $category = $this->getCategory();

            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` != :currentEmail && `$category` = :searchTerm");
            $statement->bindValue(':currentEmail', $currentEmail);
            $statement->bindValue(':searchTerm', $searchTerm);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }        

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
                $this->currentEmail = $currentEmail;

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
                $searchTerm = ucfirst($searchTerm);
                $this->searchTerm = $searchTerm;

                return $this;
        }
    }

?>