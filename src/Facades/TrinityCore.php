<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Facades;


use Illuminate\Support\Facades\Facade;
use Sasin91\LaravelTrinityCoreInteractions\TrinityCore as TrinityCoreInteraction;

class TrinityCore extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return TrinityCoreInteraction::class;
    }
}