<?php
namespace AppBundle\DataFixtures;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;

class LoadPostData extends DataFixtureLoader
{
    public function getFixtures()
    {
        return [
            __DIR__."/tags.yml",
            __DIR__."/posts.yml",
            __DIR__."/comments.yml"
        ];
    }
}
