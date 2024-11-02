<?php

namespace App\Traits;

use Mockery;
use Mockery\CompositeExpectation;
use Mockery\MockInterface;

trait MockHelpersTrait
{
    /**
     * Make sure the method "run" is called with some arguments.
     */
    public static function expectsRunOnceWith(...$with): CompositeExpectation
    {
        return self::getMock()
            ->shouldReceive('run')
            ->withArgs(array_map(fn ($value) => Mockery::mustBe($value), $with))
            ->once();
    }

    /**
     * Make sure the method "run" is called.
     */
    public static function expectsRunOnce(): CompositeExpectation
    {
        return self::getMock()
            ->shouldReceive('run')
            ->once();
    }

    /**
     * Make sure the method "transactionalRun" is called.
     */
    public static function expectsTransactionalRunOnce(): CompositeExpectation
    {
        return self::getMock()
            ->shouldReceive('transactionalRun')
            ->once();
    }

    /**
     * Get the mock object of the class.
     */
    public static function getMock(): MockInterface
    {
        $mock = Mockery::mock(static::class);

        app()->singleton(static::class, fn () => $mock);

        return $mock;
    }
}
