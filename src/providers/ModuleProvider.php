<?php

namespace tvolly\core\providers;

use tvolly\core\base\BaseProvider;
use tvolly\core\interfaces\ProviderWithConfigs;
use tvolly\core\interfaces\ProviderWithSettings;

class ModuleProvider extends BaseProvider implements ProviderWithConfigs, ProviderWithSettings
{
    public static function getName()
    {
        return 'core';
    }

    public function getConfigsUrl()
    {
        return __DIR__ . '/../../options/configs.php';
    }

    public function getSettingsUrl()
    {
        return __DIR__ . '/../../options/settings.php';
    }
}