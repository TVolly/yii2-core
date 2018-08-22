<?php

namespace tvolly\core\repositories;

class TaggableResourceRepository
{
    private $resources = [];

    public function add($tag, array $resources)
    {
        array_push($this->resources[$tag], ...$resources);
    }
}