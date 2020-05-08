<?php

namespace classes;
use PDO;
include_once( __DIR__ . '/Db.php' );


class Comment {
    private $id;
    private $comment;
    private $commentId;
    private $upvotes;

    /**
    * Get the value of id
    */

    public function getId()
    {
        return $this->id;
    }

    /**
    * Set the value of id
    *
    * @return  self
    */

    public function setId( $id )
    {
        $this->id = $id;

        return $this;
    }

    /**
    * Get the value of comment
    */

    public function getComment()
    {
        return $this->comment;
    }

    /**
    * Set the value of comment
    *
    * @return  self
    */

    public function setComment( $comment )
    {
        $this->comment = $comment;

        return $this;
    }

    /**
    * Get the value of commentId
    */

    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
    * Set the value of commentId
    *
    * @return  self
    */

    public function setCommentId( $commentId )
    {
        $this->commentId = $commentId;

        return $this;
    }

    /**
    * Get the value of upvotes
    */

    public function getUpvotes()
    {
        return $this->upvotes;
    }

    /**
    * Set the value of upvotes
    *
    * @return  self
    */

    public function setUpvotes( $upvotes )
    {
        $this->upvotes = $upvotes;

        return $this;
    }

    public function doUpvote($id)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'UPDATE `comments` SET `upvotes` = `upvotes` + 1 WHERE `id` = :id' );
        $statement->bindValue( ':id', $id );
        $result = $statement->execute();
        return $result;
    }

    public function getCurrentUpvotes($id)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare( 'SELECT `upvotes` FROM `comments` WHERE `id` = :id' );
        $statement->bindValue( ':id', $id );
        $statement->execute();
        $result = $statement->fetch( PDO::FETCH_ASSOC );
        return $result['upvotes'];
    }

    public function setVote($userId, $commentId)
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO votes (userId, commentId) VALUES (:userId, :commentId)");
        $statement->bindValue(":userId", $userId );
        $statement->bindValue(":commentId", $commentId );
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function hasVoted($userId, $commentId)
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT commentId FROM votes WHERE userId = :userId AND commentId = :commentId");
        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":commentId", $commentId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
       
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }    

}