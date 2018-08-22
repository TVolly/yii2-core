<?php

namespace tvolly\core\providers;

use tvolly\core\src\tags\TaggableResourceRepository;

abstract class BaseProvider
{
    public $name;

    public function addTaggableResources(TaggableResourceRepository $repository)
    {
//        $repository->add($tag, $resources);
    }
}