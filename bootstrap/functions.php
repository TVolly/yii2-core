<?php

function config($key, $default = null)
{
    /** @var \tvolly\core\managers\ConfigsManager $configs */
    $configs = Yii::createObject(\tvolly\core\managers\ConfigsManager::class);

    return $configs->get($key, $default);
}

function setting($key, $default = null)
{
    /** @var \tvolly\core\managers\SettingsManager $settings */
    $settings = Yii::createObject(\tvolly\core\managers\SettingsManager::class);

    return $settings->getValue($key, $default);
}

/**
 * @return \Dotenv\Dotenv
 */
function getDotenv()
{
    return Yii::createObject(\Dotenv\Dotenv::class);
}

/**
 * @param string|null $providerName
 * @return \tvolly\core\base\BaseProvider[]
 */
function getProviders($providerName = null)
{
    /** @var \tvolly\core\repositories\ProviderRepository $repository */
    $repository = Yii::createObject(\tvolly\core\repositories\ProviderRepository::class);

    return $providerName === null ? $repository->getAll() : $repository->get($providerName);
}
