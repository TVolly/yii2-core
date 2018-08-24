<?php

namespace tvolly\core\managers;

interface SettingsManager
{
    public function add($settings);

    public function load();

    public function get($key, $default = null);

    public function getValue($key, $default);

    public function getAll();
}