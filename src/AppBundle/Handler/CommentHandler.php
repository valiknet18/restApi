<?php
namespace AppBundle\Handler;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Post;

class CommentHandler
{
    public function create(Comment $comment, Post $post, $requestData)
    {
        $comment->setAuthor($requestData['author']);
        $comment->setText($requestData['text']);
        $comment->setPost($post);

        return $comment;
    }
} 