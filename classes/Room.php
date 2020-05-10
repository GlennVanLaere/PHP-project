<?php

include_once( __DIR__ . '/Db.php' );

class Room {
    private $campusLetter;
    private $campus; 

     public function getCampusLetter()
    {
        return $this->campusLetter;
    }

    public function setCampusLetter( $campusLetter )
    {
        $this->campusLetter = $campusLetter;

        return $this;
    }

    public function getCampus()
    {
        return $this->campus;
    }

    public function setCampus( $campus )
    {
        $this->campus = $campus;

        return $this;
    }

    public function searchCampus() 
    {
        $letter = $this->getCampusLetter();
        $conn = Db::getConnection();
        $statement = $conn->prepare( 'SELECT name FROM campuses WHERE letter = :letter' );
        $statement->bindValue( ':letter', $letter );
        $statement->execute();
        $result = $statement->fetch( PDO::FETCH_ASSOC );
        $this->setCampus( $result['name'] );
    }
}