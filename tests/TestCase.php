<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreateApplication, RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();
        
        $this->withoutVite();
    }
    //
}
