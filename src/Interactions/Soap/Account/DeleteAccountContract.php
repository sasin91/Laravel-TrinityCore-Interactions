<?php

namespace  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelInteractions\Interactions\Interactable;

/**
 * Class DeleteAccountContract
 * @package  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
interface DeleteAccountContract extends Interactable
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}