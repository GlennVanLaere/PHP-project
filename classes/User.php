<?php 

include_once(__DIR__ . "/Db.php");


    class User{
        private $email;
        private $firstName;
        private $lastName;
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

            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email=? ");
            $statement->execute([$email]); 
            $users = $statement->fetch();

            if(empty($email)){
                throw new Exception("Email cannot be empty");
            }else          
            if(!preg_match('|@student.thomasmore.be$|', $email)){
                throw new Exception("Email must end with @student.thomasmore.be");
            }else
            if ($users) {
                throw new Exception("Email is already in use");
            }
                          
            $this->email = $email;
            return $this;
            
            
        }

          /**
         * Get the value of firstName
         */ 
        public function getFirstName()
        {
                return $this->firstName;
        }

        /**
         * Set the value of firstName
         *
         * @return  self
         */ 
        public function setFirstName($firstName)
        {
            if(empty($firstName)){
                throw new Exception("First name cannot be empty");
            }

            $number = preg_match('@[0-9]@', $firstName); // includes number?

            if($number){
                throw new Exception("First name cannot include numbers");
            }

                $this->firstName = $firstName;

                return $this;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
                return $this->lastName;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
            if(empty($lastName)){
                throw new Exception("Last name cannot be empty");
            }

            $number = preg_match('@[0-9]@', $lastName); // includes number?

            if($number){
                throw new Exception("last name cannot include numbers");
            }
                $this->lastName = $lastName;

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

            // Validate password strength
            $upper = preg_match('@[A-Z]@', $password); // includes uppercase?
            $lower = preg_match('@[a-z]@', $password); // includes lowercase?
            $number = preg_match('@[0-9]@', $password); // includes number?
            $special = preg_match('@[^\w]@', $password); // includes special characters?

            if(!$upper){
                throw new Exception("password must include an uppercase");
            }

            if(!$lower){
                throw new Exception("password must include a lowercase");
            }

            if(!$number) {
                throw new Exception("password must include a number");
            }

            if(!$special) {
                throw new Exception("password must include a special character (for example: @ & / - )"); 
            }

            if(strlen($password) < 8) {
                throw new Exception("password must be at least 8 characters long");
            }

            $password = password_hash($password, PASSWORD_DEFAULT,["cost"=>16]);   
            $this->password = $password;

            return $this;
        }


        public function save(){

            try {
                $conn = Db::getConnection();
                $statement = $conn->prepare('INSERT INTO users (email, firstName, lastName, password) VALUES (:email, :firstName, :lastName, :password)');
    
                $email = $this->getEmail();
                $firstName = $this->getFirstName();
                $lastName = $this->getLastName();
                $password = $this->getPassword();
            
                $statement->bindValue(":email", $email);
                $statement->bindValue(":firstName", $firstName);
                $statement->bindValue(":lastName", $lastName);
                $statement->bindValue(":password", $password);
    
                $result = $statement->execute();
    
                return $result;
                    
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    
        public static function getAll(){
            $conn = DB::getConnection();
    
            $statement = $conn->prepare("select * from users");
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $users;
    
        }
    

      
    }