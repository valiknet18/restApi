<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Post;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;;
use Nelmio\ApiDocBundle\Annotation\ApiDoc as ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends FOSRestController
{
    /**
     * @ApiDoc(
     *      resource = true,
     *      description = "This method render last comments by count",
     *      statusCodes = {
     *          200 = "Return last comments by count"
     *      }
     * )
     *
     * @param $count
     * @return \AppBundle\Entity\Comment[]|array
     *
     * @View()
     */
    public function getCommentsLastAction($count)
    {
        $comments = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AppBundle:Comment')
                        ->findBy([], $count);

        return $comments;
    }

    /**
     * @ApiDoc(
     *      resource = true,
     *      description = "Create new comment",
     *      statusCodes = {
     *          201 = "Comment successful created"
     *      }
     * )
     *
     * @param Request $request
     * @param Post $post
     * @return \FOS\RestBundle\View\View
     *
     * @View()
     */
    public function postCommentCreateAction(Request $request, Post $post)
    {
        $em = $this->getDoctrine()
                    ->getManager();

        $comment = new Comment();

        $comment = $this->get('app_bundle.handle.comment_handle')->create($comment, $post, $request->request->all());

        $em->persist($comment);
        $em->flush();

        return $this->view('Comment created', 201);
    }
}
