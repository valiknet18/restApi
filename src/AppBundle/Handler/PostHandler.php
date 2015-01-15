<?php
namespace AppBundle\Handler;

use AppBundle\Entity\Post;

class PostHandler
{
    /**
     * @param Post $post
     * @param $requestData
     * @return Post
     */
    public function create(Post $post, $requestData)
    {
        $post->setTitle($requestData['title']);
        $post->setText($requestData['text']);
        $post->setAuthor($requestData['author']);

        return $post;
    }
} 