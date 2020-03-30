<?php
    include_once(__DIR__ . "/Db.php");

    class currentKenmerken {
        private $kenmerk;
        private $muziek;
        private $films;
        private $games;
        private $boeken;
        private $tvprogrammas;
        private $buddy;

        /**
         * Get the value of kenmerk
         */ 
        public function getKenmerk()
        {
            
                return $this->kenmerk;
        }

        /**
         * Set the value of kenmerk
         *
         * @return  self
         */ 
        public function setKenmerk($kenmerk, $email)
        {
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email");
            $statement->bindValue('email', $email);
            $statement->execute();
            $kenmerk = $statement->fetch(PDO::FETCH_ASSOC);
                $this->kenmerk = $kenmerk;

                return $this;
        }

        public function updateKenmerken($email)
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
    }