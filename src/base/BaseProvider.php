<?php

namespace tvolly\core\base;

use yii\base\BootstrapInterface;
use yii\base\Event;

abstract class BaseProvider implements BootstrapInterface
{
    const ON_BOOTSTRAP = 'onBootstrap';

    protected $resourceRepository;

    abstract public static function getName();

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param \yii\base\Application $app the application currently running
     */
    public function bootstrap($app)
    {
        Event::trigger($this, self::ON_BOOTSTRAP);
    }
}