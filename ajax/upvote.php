<?php
include_once( __DIR__ . '/../classes/Comment.php' );
session_start();

if ( !empty( $_POST ) ) {

    $id = $_POST['id'];

    $comment = new Comment();
    $comment->setId( $id );
    $comment->doUpvote( $id );
    $currentUpvotes = $comment->getCurrentUpvotes($id);

    $response = [
        'status' => 'succes',
        'message' => 'upvote was successful',
        'id' => $id,
        'currentUpvotes' =>  $currentUpvotes
    ];

    header( 'Content-Type: application/json' );
    echo json_encode( $response );
};