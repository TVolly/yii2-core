<?php

namespace tvolly\core\repositories;

use tvolly\core\base\BaseProvider;
use tvolly\core\exceptions\ProviderException;

class ProviderRepository
{
    private $items = [];

    public function add(BaseProvider $provider)
    {
        $this->items[$provider::getName()] = $provider;
    }

    public function get($name)
    {
        if (!isset($this->items[$name])) {
            throw new ProviderException('Unknown provider "' . $name . '"');
        }

        return $this->items[$name];
    }

    /**
     * @return BaseProvider[]
     */
    public function getAll()
    {
        return $this->items;
    }
}