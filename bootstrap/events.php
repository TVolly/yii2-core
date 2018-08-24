<?php

use yii\base\Event;

Event::on(\tvolly\core\base\BaseProvider::class, \tvolly\core\base\BaseProvider::ON_BOOTSTRAP, function (Event $event) {
    /** @var \tvolly\core\repositories\ProviderRepository $providerRepository */
    $providerRepository = Yii::createObject(\tvolly\core\repositories\ProviderRepository::class);
    $providerRepository->add($event->sender);
});

Event::on(\yii\base\Application::class, \yii\base\Application::EVENT_BEFORE_REQUEST, function () {
    /** @var \tvolly\core\managers\ConfigsManager $configs */
    $configs = Yii::createObject(\tvolly\core\managers\ConfigsManager::class);
    $configs->load();

    /** @var \tvolly\core\managers\SettingsManager $settings */
    $settings = Yii::createObject(\tvolly\core\managers\SettingsManager::class);
    $settings->load();
});
