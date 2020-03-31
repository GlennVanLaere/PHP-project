<?php 

include_once(__DIR__ . "/Db.php");


    class User{
        private $email;
        private $firstName;
        private $lastName;
        private $password;
        private $currentEmail;
        private $currentFirstName;
        private $currentLastName;
        private $currentPassword;
        private $tags;
        private $muziek;
        private $films;
        private $games;
        private $boeken;
        private $tvprogrammas;
        private $buddy;


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
        
        /**
         * Get the value of tags
         */ 
        public function getTags()
        {
            
                return $this->tags;
        }

        /**
         * Set the value of tags
         *
         * @return  self
         */ 
        public function setTags($tags, $email)
        {
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email");
            $statement->bindValue('email', $email);
            $statement->execute();
            $tags = $statement->fetch(PDO::FETCH_ASSOC);
                $this->tags = $tags;

                return $this;
        }
        /**
         * Get the value of muziek
         */ 
        public function getMuziek()
        {
                return $this->muziek;
        }

        /**
         * Set the value of muziek
         *
         * @return  self
         */ 
        public function setMuziek($muziek)
        {
                $this->muziek = $muziek;

                return $this;
        }

        /**
         * Get the value of films
         */ 
        public function getFilms()
        {
                return $this->films;
        }

        /**
         * Set the value of films
         *
         * @return  self
         */ 
        public function setFilms($films)
        {
                $this->films = $films;

                return $this;
        }

        /**
         * Get the value of games
         */ 
        public function getGames()
        {
                return $this->games;
        }

        /**
         * Set the value of games
         *
         * @return  self
         */ 
        public function setGames($games)
        {
                $this->games = $games;

                return $this;
        }

        /**
         * Get the value of boeken
         */ 
        public function getBoeken()
        {
                return $this->boeken;
        }

        /**
         * Set the value of boeken
         *
         * @return  self
         */ 
        public function setBoeken($boeken)
        {
                $this->boeken = $boeken;

                return $this;
        }

        /**
         * Get the value of tvprogrammas
         */ 
        public function getTvprogrammas()
        {
                return $this->tvprogrammas;
        }

        /**
         * Set the value of tvprogrammas
         *
         * @return  self
         */ 
        public function setTvprogrammas($tvprogrammas)
        {
                $this->tvprogrammas = $tvprogrammas;

                return $this;
        }

        /**
         * Get the value of buddy
         */ 
        public function getBuddy()
        {
                return $this->buddy;
        }

        /**
         * Set the value of buddy
         *
         * @return  self
         */ 
        public function setBuddy($buddy)
        {
                if($buddy == 'Maak een keuze'){
                        throw new Exception("Kies wat voor buddy je wilt zijn");
                }
                $this->buddy = $buddy;

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

        public function canLogin() {
            $currentEmail = $this->getCurrentEmail();
            $currentPassword = $this->getCurrentPassword();
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email = :currentEmail");
            $statement->bindValue(":currentEmail", $currentEmail);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (password_verify($currentPassword, $user["password"])) {
                return true;
            } else {
                return false;
            }
        }

        function checkComplete(){
            $email = $this->getCurrentEmail();
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email ");
            $statement->bindValue(':email', $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $nummer = array_count_values($result);
            if(isset($nummer['Maak een keuze'])){
                if($nummer['Maak een keuze'] > 4){
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        }
        public function login($complete) {
            session_start();
            $_SESSION["user"] = $this->getCurrentEmail();
            if($complete){
                header("Location: index.php");
                
            } else {
                header("Location: tags.php");
            }
        }
        public function updateTags($email)
        {    
            try{       
                $muziek = $this->getMuziek();
                $films = $this->getFilms();
                $games = $this->getGames();
                $boeken = $this->getBoeken();
                $tvprogrammas = $this->getTvprogrammas();
                $buddy = $this->getBuddy();
                $conn = Db::getConnection();
                $statement = $conn->prepare("UPDATE `users` SET `muziek`= :muziek,`films`= :films,`games`= :games,`boeken`= :boeken,`tvprogrammas`= :tvprogrammas, `buddy` = :buddy WHERE `email` = :email");
                $statement->bindValue('email', $email);
                $statement->bindValue(':muziek', htmlspecialchars($muziek));
                $statement->bindValue(':films', htmlspecialchars($films));
                $statement->bindValue(':games', htmlspecialchars($games));
                $statement->bindValue(':boeken', htmlspecialchars($boeken));
                $statement->bindValue(':tvprogrammas', htmlspecialchars($tvprogrammas));
                $statement->bindValue(':buddy', htmlspecialchars($buddy));
                $statement->execute();
                header("Location: index.php");
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }