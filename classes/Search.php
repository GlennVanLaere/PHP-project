<?php 

include_once(__DIR__ . "/Db.php");

    class Search {

        private $searchTerm;
        private $category;
        private $currentEmail;

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
                $category = preg_replace("/[^a-z-A-Z]/", "", $category);
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
                $searchTerm = preg_replace("/[^a-z-A-Z]/", "", $searchTerm);
                $this->searchTerm = $searchTerm;
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

    public function goSearch() {
        $currentEmail = $this->getCurrentEmail();
        $category = $this->getCategory();
        $searchTerm = $this->getSearchTerm();
       
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` != :currentEmail && `$category` like '%$searchTerm%' ");
        $statement->bindValue(':currentEmail', $currentEmail);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } 
    

}