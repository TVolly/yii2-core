<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/events.php';

\yii\base\Event::on(\yii\di\Container::class, 'AFTER_MAIN_CONTAINER_INIT', function () {
    require __DIR__ . '/di.php';

    require __DIR__ . '/env.php';
});
