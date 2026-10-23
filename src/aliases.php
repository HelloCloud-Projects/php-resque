<?php

declare(strict_types=1);

/**
 * Lazy global aliases for the php-resque 1.x class names (`Resque`, `Resque_Job`, ...),
 * so legacy code keeps working against the namespaced classes.
 */
spl_autoload_register(static function (string $class): void {
    static $map = [
        'Resque' => \Resque\Resque::class,
        'Resque_Event' => \Resque\Event::class,
        'Resque_Exception' => \Resque\Exception::class,
        'Resque_Redis' => \Resque\Redis::class,
        'Resque_RedisException' => \Resque\RedisException::class,
        'Resque_Stat' => \Resque\Stat::class,
        'Resque_Log' => \Resque\Log::class,
        'Resque_Worker' => \Resque\Worker::class,
        'Resque_Job' => \Resque\Job\Job::class,
        'Resque_JobInterface' => \Resque\Job\JobInterface::class,
        'Resque_Job_DirtyExitException' => \Resque\Job\DirtyExitException::class,
        'Resque_Job_DontCreate' => \Resque\Job\DontCreate::class,
        'Resque_Job_DontPerform' => \Resque\Job\DontPerform::class,
        'Resque_Job_Factory' => \Resque\Job\Factory::class,
        'Resque_Job_FactoryInterface' => \Resque\Job\FactoryInterface::class,
        'Resque_Failure' => \Resque\Failure\Failure::class,
        'Resque_Failure_Interface' => \Resque\Failure\ResqueFailureInterface::class,
        'Resque_Failure_Redis' => \Resque\Failure\ResqueFailureRedis::class,
    ];

    if (isset($map[$class])) {
        class_alias($map[$class], $class);
    }
});
