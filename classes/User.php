<?php 

include_once(__DIR__ . "/Db.php");




    class User {
        private $id;
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

        //feature 3 gedeelte
        
        private $description;
        private $oldEmail;
        private $newEmail;
        private $newEmailCheck;
        private $newPassword;
        private $oldPassword;
        private $passwordCheck;
        private $avatarUpload;


        private $fileName;
        // private $profilePicture;

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
        
        public function getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;

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
        public function getOldEmail(){
            return $this->oldEmail;
        }
        public function setOldEmail($oldEmail){
            $this->oldEmail = $oldEmail;
            return $this;
        }

        public function getNewEmail(){
            return $this->newEmail;
        }
        public function setNewEmail($newEmail){
            $this->newEmail = $newEmail;
            return $this;
        }

        public function getNewEmailCheck(){
            return $this->newEmailCheck;
        }
        public function setNewEmailCheck($newEmailCheck){
            $this->newEmailCheck = $newEmailCheck;
            return $this;
        }

        public function getNewPassword(){
            return $this->newPassword;
        }
        public function setNewPassword($newPassword){
            $this->newPassword = $newPassword;
            return $this;
        }
        public function getOldPassword(){
            return $this->oldPassword;
        }
        public function setOldPassword($oldPassword){
            $this->oldPassword = $oldPassword;
            return $this;
        }
        public function getPasswordCheck(){
            return $this->passwordCheck;
        }
        public function setPasswordcheck($passwordCheck){
            $this->passwordCheck = $passwordCheck;
            return $this;
        }

        public function getAvatarUpload(){
            return $this->avatarUpload;
        }
        public function setAvatarUpload($avatarUpload){
            $this->avatarUpload = $avatarUpload;
            return $this;
        }

        public function setFileName(){
            return $this->fileName;
        }
        public function getFileName($fileName){
            $this->fileName = $fileName;
            return $this;
        }


        public function save(){

            try {
                $conn = Db::getConnection();
                $statement = $conn->prepare('INSERT INTO users (email, firstName, lastName, password, description, avatar) VALUES (:email, :firstName, :lastName, :password, :description, :avatar)');
                
                

                $email = $this->getEmail();
                $firstName = $this->getFirstName();
                $lastName = $this->getLastName();
                $password = $this->getPassword();
                $description = "here comes your description";
                $avatar = "uploads/standard.png";

            
                
            
                $statement->bindValue(":email", $email);
                $statement->bindValue(":firstName", $firstName);
                $statement->bindValue(":lastName", $lastName);
                $statement->bindValue(":password", $password);
                $statement->bindValue(":description", $description);
                $statement->bindValue(":avatar", $avatar);


    
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

        public function viewEmail($email){

           try {
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT email FROM users WHERE email = :yourEmail");
            $statement->bindValue("yourEmail", $email);
            $statement->execute();
            while($row = $statement->fetch()){
                $activeEmail = $row['email'];
                return $activeEmail;
            }

           } 
           catch (PDOException $e) {
                print "Error: ".$e->getMessage()."<br>";
           }
        }
        public function viewDescription($email){
              try {
           
             $conn = Db::getConnection();
             $statement = $conn->prepare("SELECT description FROM users WHERE email = :currentEmail");
             $statement->bindValue(":currentEmail", $email);
             $statement->execute();
             while($row = $statement->fetch()){
                 $activeDescription = $row['description'];
                 return $activeDescription;
             }
 
            } 
            catch (PDOException $e) {
                 print "Error: ".$e->getMessage()."<br>";
            }
         }
         public function editDescription($email){

            try {
               
                $conn = Db::getConnection();
                $updateDesStmt = $conn->prepare("UPDATE users SET description=:description WHERE email = :email");
                $description = $this->getDescription();
    
                $updateDesStmt->bindValue(":description", $description);
                $updateDesStmt->bindValue(":email", $email);

                $descrResult = $updateDesStmt->execute();
                return $descrResult;
            }
             
            
            catch (PDOException $e) {
                print "Error: ".$e->getMessage()."<br>";
           }


           }
           public function editEmail($email){
            try{
                $conn = Db::getConnection();
                $mailUpdateStmt = $conn->prepare("UPDATE users SET email=:newEmail WHERE email=:email");
                $oldEmail = $this->getOldEmail();
                $newEmail = $this->getNewEmail();
                $newEmailCheck = $this->getNewEmailCheck();


            if($email === $oldEmail){

                if($newEmail === $newEmailCheck){

                    if(preg_match('|@student.thomasmore.be$|', $newEmail)){
                        $mailUpdateStmt->bindValue(":newEmail", $newEmail);
                        $mailUpdateStmt->bindValue(":email", $email);
                        $updateEmailRes = $mailUpdateStmt->execute();
                        $_SESSION["user"] = $newEmail;
                        return $updateEmailRes;
                       

                    }
                    else{
                        throw new Exception("Email must end with @student.thomasmore.be");
                    }

                }
                else{
                    throw new Exception("you did not repeat the correct email adress");
                }

            }
            else{
                throw new Exception("this email does not exist in our database");
            }


            }
            catch(PDOException $e){
             print "Error: ".$e->getMessage()."<br>";

            }
         }

         public function changePassword($email){
             //get old password
             $conn = Db::getConnection();
                $selectPassword = $conn->prepare("SELECT password FROM users WHERE email=:email");
                $selectPassword->bindValue(":email", $email);
                $selectPassword->execute();
             while($row = $selectPassword->fetch()){
                 $dbPassword = $row['password'];

                
                 $newPassword = $this->getNewPassword();
                 $passwordCheck = $this->getPasswordCheck();

                 $updatePassword = $conn->prepare("UPDATE users SET password=:password WHERE email=:email");

                 if($newPassword === $passwordCheck){
                    $upper = preg_match('@[A-Z]@', $newPassword); // includes uppercase?
                    $lower = preg_match('@[a-z]@', $newPassword); // includes lowercase?
                    $number = preg_match('@[0-9]@', $newPassword); // includes number?
                    $special = preg_match('@[^\w]@', $newPassword); // includes special characters?

                    if($upper){
                        if($lower){
                            if($number){
                                if($special){
                                   if(strlen($newPassword) > 8 ){

                                        $oldPassword = $this->getOldPassword();
                                        if(password_verify($oldPassword, $dbPassword)){
                                            $newpasswordHash = password_hash($newPassword, PASSWORD_DEFAULT, ["cost"=>16]);
                                            $updatePassword->bindvalue(":password", $newpasswordHash);
                                            $updatePassword->bindValue(":email", $email);
                                            $passresult = $updatePassword->execute();
                                            return $passresult;
                                        }
                                        else{
                                            throw new Exception("wrong password");
                                        }
                                   } 
                                   else{
                                    throw new Exception("password must be at least 8 characters long");
                                   }

                                }
                                else{
                                    throw new Exception("password must include a special character (for example: @ & / - )");
                                }

                            }
                            else{
                                throw new Exception("password must include a number");
                            }

                        }
                        else{
                            throw new Exception("password must include a lowercase");
                        }
                    }
                    else{
                        throw new Exception("password must include an uppercase");
                    }
                 }
             }
             

         }
         public function changeAvatar($email, $fileName, $fileSize, $fileTmpName, $file){
            $conn = Db::getConnection();
            $profileStatement = $conn->prepare("UPDATE users SET avatar=:avatar WHERE email=:email");
            $fileName = $fileName;
            $fileSize = $fileSize;
            $fileTmpName = $fileTmpName;
            $file = $file;
            
            $fileExt = explode(".", $fileName);
            $fileExtention = strtolower(end($fileExt));
            

            $allowedFiles = array('jpg', 'jpeg', 'png');

            if(in_array($fileExtention, $allowedFiles)){
               if($fileSize < 1000000){
                $fileNewName = uniqid('', true).".".$fileExtention;
                $fileDestination = "uploads/".$fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $profileStatement->bindValue(":avatar", $fileDestination);
                $profileStatement->bindValue(":email", $email);
                $profileStatement->execute();
               }
               else{
                throw new Exception("filesize is to big!");
               }
            }
            else{
                throw new Exception("this image type is not supported by Buddy");
            }

         }
        
         public function showAvatar($email){
            $conn = Db::getConnection();
            $avatarstmt = $conn->prepare("SELECT avatar FROM users WHERE email=:email");
            $avatarstmt->bindValue(":email", $email);
            $avatarstmt->execute();
            while($row = $avatarstmt->fetch()){
                $showAvatar = $row['avatar'];
                return $showAvatar;
         }
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
                header("Location: index.php");
                
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
                header("Location: index.php");
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }
