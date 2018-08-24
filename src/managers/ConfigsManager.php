<?php

namespace tvolly\core\managers;

interface ConfigsManager
{
    public function add($configs);

    public function load();

    public function get($key, $default = null);

    public function getAll();

    public function publishToStore($providerName = null);
}