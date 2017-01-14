<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelInteractions\Interactions\Interactable;

/**
 * Class SetExpansionContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;
 */
interface SetAccountExpansionContract extends Interactable
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}