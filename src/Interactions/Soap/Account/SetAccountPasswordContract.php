<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelInteractions\Interactions\Interactable;

/**
 * Class SetAccountPasswordContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;
 */
interface SetAccountPasswordContract extends Interactable
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}