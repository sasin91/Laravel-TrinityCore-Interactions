<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Tests;

/**
 * Base Test Case
 *
 * Class TestCase
 * @package Sasin91\LaravelTrinityCoreInteractions\Tests
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($application)
    {
        return ['Sasin91\LaravelTrinityCoreInteractions\TrinityCoreInteractionsServiceProvider'];
    }

    protected function getPackageAliases($application)
    {
        return ['TrinityCore'   =>  'Sasin91\LaravelTrinityCoreInteractions\Facades\TrinityCore'];
    }
}