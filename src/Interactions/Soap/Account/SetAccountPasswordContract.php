<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

/**
 * Class SetAccountPasswordContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;
 */
interface SetAccountPasswordContract
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}