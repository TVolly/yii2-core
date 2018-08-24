<?php

namespace tvolly\core\managers;

use tvolly\core\interfaces\ProviderWithSettings;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class InMemorySettingsManager implements SettingsManager
{
    protected $settings = [];

    public function add($settings)
    {
        $this->settings = ArrayHelper::merge($this->settings, $settings);
    }

    public function load()
    {
        foreach (getProviders() as $provider) {
            if ($provider instanceof ProviderWithSettings) {
                $this->add(require Url::to($provider->getSettingsUrl()));
            }
        }
    }

    public function get($key, $default = null)
    {
        return ArrayHelper::getValue($this->settings, $key, $default);
    }

    public function getValue($key, $default)
    {
        return $this->get($key . '.value', $default);
    }

    public function getAll()
    {
        return $this->settings;
    }
}