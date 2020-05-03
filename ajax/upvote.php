<?php
include_once( __DIR__ . '/../classes/Comment.php' );
include_once( __DIR__ . '/../classes/User.php' );
session_start();

if ( !empty( $_POST ) ) {

    $commentId = $_POST['id'];

    $comment = new Comment();
    $comment->setId( $commentId );
    $comment->doUpvote( $commentId );
    $currentUpvotes = $comment->getCurrentUpvotes( $commentId );

    $email = $_SESSION['user'];
    $user = new User();
    $user->setEmail( $email );
    $user->setUserId();
    $userId = $user->getUserId();

    $comment->setVote( $userId, $commentId );

    $response = [
        'status' => 'success',
        'message' => 'upvote was successful',
        'id' => $commentId,
        'currentUpvotes' =>  $currentUpvotes
    ];

    header( 'Content-Type: application/json' );
    echo json_encode( $response );
};