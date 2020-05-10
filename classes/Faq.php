<?php

namespace classes;
use PDO;
include_once( __DIR__ . '/Db.php' );

class Faq {

    private $question;
    private $comment;

    public function getQuestion() 
    {
        return $this->question;
    }

    public function setQuestion( $question ) 
    {
        $this->question = $question;

        return $this;
    }

    public function getComment() 
    {
        return $this->comment;
    }

    public function setComment( $comment ) 
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAllQuestions( $pin ) 
    {
        $pin = $pin;
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'SELECT * FROM `questions` WHERE `pinned` = :pin ORDER BY `id` DESC' );
        $statement->bindValue( ':pin', $pin );
        $statement->execute();
        $result = $statement->fetchAll( PDO::FETCH_ASSOC );

        return $result;
    }

    public function askQuestion( $question ) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'INSERT INTO `questions`(`question`, `pinned`) VALUES (:question, 0)' );
        $statement->bindValue( ':question', $question );
        $result = $statement->execute();

        return $result;
    }

    public function pinQuestion( $id ) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'UPDATE `questions` SET `pinned`= 1 WHERE `id` = :id' );
        $statement->bindValue( ':id', $id );
        $result = $statement->execute();

        return $result;
    }

    public function unPinQuestion( $id ) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'UPDATE `questions` SET `pinned`= 0 WHERE `id` = :id' );
        $statement->bindValue( ':id', $id );
        $result = $statement->execute();

        return $result;
    }

    /*-- discussion functions --*/

    public function CurrentQuestion( $id ) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'SELECT * FROM `questions` WHERE `id` = :id' );
        $statement->bindValue( ':id', $id );
        $statement->execute();
        $result = $statement->fetch( PDO::FETCH_ASSOC );

        return $result;
    }

    public function getComments( $id ) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'SELECT * FROM `comments` WHERE `commentId` = :id ORDER BY `upvotes` DESC ' );
        $statement->bindValue( ':id', $id );
        $statement->execute();
        $result = $statement->fetchAll( PDO::FETCH_ASSOC );

        return $result;
    }

    public function placeComment( $comment, $id ) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'INSERT INTO `comments`(`comment`, `commentId`) VALUES (:comment, :commentId)' );
        $statement->bindValue( ':comment', $comment );
        $statement->bindValue( ':commentId', $id );
        $result = $statement->execute();

        return $result;
    }
}