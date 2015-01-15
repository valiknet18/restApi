<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc as ApiDoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * @ApiDoc(
     *      resource = true,
     *      description = "This method return all posts",
     *      statusCodes = {
     *          200 = "Return all posts"
     *      }
     * )
     *
     * @return \AppBundle\Entity\Post[]|array
     *
     * @View()
     */
    public function getPostsAllAction()
    {
        $posts = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        return $posts;
    }

    /**
     * @ApiDoc(
     *      resource = true,
     *      description = "This method return limit posts with offset",
     *      statusCodes = {
     *          200 = "Return when successful"
     *      }
     * )
     *
     * @param int $limit = 10
     * @param int $offset = 10
     *
     * @return \AppBundle\Entity\Post[]|array
     *
     * @View()
     */
    public function getPostsOffsetAction($limit = 10, $offset = 10)
    {
        $posts = $this->getDoctrine()
                    ->getRepository('AppBundle:Post')
                    ->findBy([],[], $limit, $offset);

        return $posts;
    }

    /**
     * @ApiDoc(
     *      resource = true,
     *      description = "This method return post by param",
     *      statusCodes = {
     *          200 = "Return when post isset",
     *          404 = "Return when post not isset"
     *      }
     * )
     *
     * @param  Post $post
     * @return Post
     *
     * @View()
     */
    public function getPostAction(Post $post)
    {
        return $post;
    }

    public function postPostAction(Request $request)
    {

    }
}
