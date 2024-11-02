<?php

namespace App\Parents\Test;

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
abstract class ParentTest extends TestCase
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
