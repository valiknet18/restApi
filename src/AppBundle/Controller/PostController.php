<?php
namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

class PostController extends FOSRestController
{
    /**
     * @return \AppBundle\Entity\Post[]|array
     *
     * @Rest\View(templateVar="posts")
     */
    public function getPostsAction()
    {
        $posts = $this->getDoctrine()
                    ->getRepository('AppBundle:Post')
                    ->findAll();

        return $posts;
    }
}
