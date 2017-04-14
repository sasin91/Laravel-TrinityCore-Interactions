<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;


/**
 * Class SetExpansionContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;
 */
interface SetAccountExpansionContract
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}