<?php

defined('ENV_DIR') or define('ENV_DIR', dirname(__DIR__, 4));

Yii::$container->setSingleton(\Dotenv\Dotenv::class, function () {
    $dotenv = new \Dotenv\Dotenv(ENV_DIR);
    $dotenv->load();

    return $dotenv;
});

Yii::$container->setSingleton(\tvolly\core\repositories\ProviderRepository::class);

Yii::$container->setSingleton(
    \tvolly\core\managers\ConfigsManager::class,
    \tvolly\core\managers\InMemoryConfigsManager::class
);

Yii::$container->setSingleton(
    \tvolly\core\managers\SettingsManager::class,
    \tvolly\core\managers\InMemorySettingsManager::class
);

