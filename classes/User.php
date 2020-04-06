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
        private $music;
        private $movies;
        private $games;
        private $books;
        private $tvShows;
        private $buddy;
        private $userId;
        private $buddyId;

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
         * Get the value of music
         */ 
        public function getMusic()
        {
                return $this->music;
        }

        /**
         * Set the value of music
         *
         * @return  self
         */ 
        public function setMusic($music)
        {
                $this->music = $music;

                return $this;
        }

        /**
         * Get the value of movies
         */ 
        public function getMovies()
        {
                return $this->movies;
        }

        /**
         * Set the value of movies
         *
         * @return  self
         */ 
        public function setMovies($movies)
        {
                $this->movies = $movies;

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
         * Get the value of books
         */ 
        public function getBooks()
        {
                return $this->books;
        }

        /**
         * Set the value of books
         *
         * @return  self
         */ 
        public function setBooks($books)
        {
                $this->books = $books;

                return $this;
        }

        /**
         * Get the value of tvShows
         */ 
        public function getTvShows()
        {
                return $this->tvShows;
        }

        /**
         * Set the value of tvShows
         *
         * @return  self
         */ 
        public function setTvShows($tvShows)
        {
                $this->tvShows = $tvShows;

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
                if($buddy == 'Make a choice'){
                        throw new Exception("Choose what kind of buddy you want to be");
                }
                $this->buddy = $buddy;

                return $this;
        }

        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId()
        {
            try {
                $conn = Db::getConnection();
                $statement = $conn->prepare("SELECT id FROM users WHERE email = :email");
                $statement->bindValue(":email", $_SESSION['user']);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                
                $this->userId = $user['id'];

                return $this;
            } catch (\Throwable $th) {
                $error = $th->getMessage();
            }
        }

        /**
         * Get the value of buddyId
         */ 
        public function getBuddyId()
        {
                return $this->buddyId;
        }

        /**
         * Set the value of buddyId
         *
         * @return  self
         */ 
        public function setBuddyId($buddyId)
        {
                $this->buddyId = $buddyId;

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
            $number = array_count_values($result);
            if(isset($number['Make a choice'])){
                if($number['Make a choice'] > 4){
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
                header("Location: match.php");
                
            } else {
                header("Location: tags.php");
            }
        }
        public function updateTags($email)
        {    
            try{       
                $music = $this->getMusic();
                $movies = $this->getMovies();
                $games = $this->getGames();
                $books = $this->getBooks();
                $tvShows = $this->getTvShows();
                $buddy = $this->getBuddy();
                $conn = Db::getConnection();
                $statement = $conn->prepare("UPDATE `users` SET `music`= :music,`movies`= :movies,`games`= :games,`books`= :books,`tvShows`= :tvShows, `buddy` = :buddy WHERE `email` = :email");
                $statement->bindValue('email', $email);
                $statement->bindValue(':music', htmlspecialchars($music));
                $statement->bindValue(':movies', htmlspecialchars($movies));
                $statement->bindValue(':games', htmlspecialchars($games));
                $statement->bindValue(':books', htmlspecialchars($books));
                $statement->bindValue(':tvShows', htmlspecialchars($tvShows));
                $statement->bindValue(':buddy', htmlspecialchars($buddy));
                $statement->execute();
                header("Location: match.php");
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function findCurrentUser($email){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users where email = :email");
            $statement->bindValue(":email", $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        public function findPerfectMatch($info){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email != :email && buddy != :buddy && music = :music && movies = :movies && games = :games && books = :books && tvShows = :tvShows");
            $statement->bindValue(":email", $info["email"]);
            $statement->bindValue(":buddy", $info["buddy"]);
            $statement->bindValue(":music", $info["music"]);
            $statement->bindValue(":movies", $info["movies"]);
            $statement->bindValue(":games", $info["games"]);
            $statement->bindValue(":books", $info["books"]);
            $statement->bindValue(":tvShows", $info["tvShows"]);
            $statement->execute();
            $perfectMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $perfectMatch;
        }

        public function findBuddyMatch($info){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email != :email && buddy != :buddy");
            $statement->bindValue(":email", $info["email"]);
            $statement->bindValue(":buddy", $info["buddy"]);
            $statement->execute();
            $buddyMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $buddyMatch;
        }

        public function findMusicMatch($info){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email != :email && buddy != :buddy && music = :music");
            $statement->bindValue(":email", $info["email"]);
            $statement->bindValue(":buddy", $info["buddy"]);
            $statement->bindValue(":music", $info["music"]);
            $statement->execute();
            $musicMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $musicMatch;
        }

        public function findMoviesMatch($info){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email != :email && buddy != :buddy && movies = :movies");
            $statement->bindValue(":email", $info["email"]);
            $statement->bindValue(":buddy", $info["buddy"]);
            $statement->bindValue(":movies", $info["movies"]);
            $statement->execute();
            $moviesMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $moviesMatch;
        }

        public function findGamesMatch($info){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email != :email && buddy != :buddy && games = :games");
            $statement->bindValue(":email", $info["email"]);
            $statement->bindValue(":buddy", $info["buddy"]);
            $statement->bindValue(":games", $info["games"]);
            $statement->execute();
            $gamesMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $gamesMatch;
        }

        public function findBooksMatch($info){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email != :email && buddy != :buddy && books = :books");
            $statement->bindValue(":email", $info["email"]);
            $statement->bindValue(":buddy", $info["buddy"]);
            $statement->bindValue(":books", $info["books"]);
            $statement->execute();
            $booksMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $booksMatch;
        }

        public function findTvShowsMatch($info){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email != :email && buddy != :buddy && tvShows = :tvShows");
            $statement->bindValue(":email", $info["email"]);
            $statement->bindValue(":buddy", $info["buddy"]);
            $statement->bindValue(":tvShows", $info["tvShows"]);
            $statement->execute();
            $tvShowsMatch = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $tvShowsMatch;
        }
        
        public function hasBuddy($id) {
            try {
                $conn = Db::getConnection();
                $statement = $conn->prepare("SELECT id, buddyId FROM users WHERE email = :email AND buddyId = :buddyId");
                $statement->bindValue(":email", $_SESSION['user']);
                $statement->bindValue(":buddyId", $id);
                $statement->execute();
                $buddy = $statement->fetch(PDO::FETCH_ASSOC);
                return $buddy;
            } catch (\Throwable $th) {
                $error = $th->getMessage();
            }

        }

        public function sentRequest($userId, $id) {
            try {
                $conn = Db::getConnection();
                $statement = $conn->prepare("SELECT sender, receiver FROM requests WHERE sender = :sender AND receiver = :receiver");
                $statement->bindValue(":sender", $userId);
                $statement->bindValue(":receiver", $id);
                $statement->execute();
                $request = $statement->fetch(PDO::FETCH_ASSOC);
                return $request;
                
            } catch (\Throwable $th) {
                $error = $th->getMessage();

            }
        }

        public function receivedRequest($userId, $id) {
            try {
                $conn = Db::getConnection();
                $statement = $conn->prepare("SELECT sender, receiver FROM requests WHERE sender = :sender AND receiver = :receiver");
                $statement->bindValue(":sender", $id);
                $statement->bindValue(":receiver", $userId);
                $statement->execute();
                $request = $statement->fetch(PDO::FETCH_ASSOC);
                return $request;
            } catch (\Throwable $th) {
                $error = $th->getMessage();
            }       
        }
    }