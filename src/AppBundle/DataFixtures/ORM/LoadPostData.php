<?php
namespace Valiknet\Blog\PostsBundle\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Valiknet\Blog\PostsBundle\Entity\Post;
use Valiknet\Blog\PostsBundle\Entity\Tag;

class LoadPostData extends DataFixtureLoader
{
    public function getFixtures()
    {
        return [
            "tags.yml",
            "posts.yml",
            "comments.yml"
        ];
    }
}
