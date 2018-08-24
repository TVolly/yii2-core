<?php

namespace tvolly\core\managers;

use tvolly\core\exceptions\ProviderException;
use tvolly\core\interfaces\ProviderWithConfigs;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Url;

class InMemoryConfigsManager implements ConfigsManager
{
    private $configs = [];
    private $storeDirectory = '@common/providers/configs';

    public function add($configs)
    {
        $this->configs = ArrayHelper::merge($this->configs, $configs);
    }

    public function load()
    {
        foreach (getProviders() as $provider) {
            if ($provider instanceof ProviderWithConfigs) {
                $this->add(require Url::to($provider->getConfigsUrl()));
            }
        }

        $files = FileHelper::findFiles(Url::to($this->storeDirectory), [
            'only' => ['*.php']
        ]);

        foreach ($files as $file) {
            $this->add(require $file);
        }
    }

    public function get($key, $default = null)
    {
        return ArrayHelper::getValue($this->configs, $key, $default);
    }

    public function getAll()
    {
        return $this->configs;
    }

    public function publishToStore($providerName = null)
    {
        if ($providerName === null) {
            foreach (getProviders($providerName) as $provider) {
                if ($provider instanceof ProviderWithConfigs) {
                    $source = Url::to($provider->getConfigsUrl());
                    $dest = Url::to($this->storeDirectory . '/' . $provider::getName() . '.php');

                    copy($source, $dest);
                }
            }
        } else {
            /** @var \tvolly\core\base\BaseProvider $provider */
            $provider = getProviders($providerName);

            if ($provider instanceof ProviderWithConfigs) {
                $source = Url::to($provider->getConfigsUrl());
                $dest = Url::to($this->storeDirectory . '/' . $provider::getName() . '.php');

                copy($source, $dest);
            } else {
                throw new ProviderException('Provider is not instance of ProviderWithConfigs');
            }
        }
    }
}