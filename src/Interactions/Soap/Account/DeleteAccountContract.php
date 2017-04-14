<?php

namespace  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

/**
 * Class DeleteAccountContract
 * @package  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
interface DeleteAccountContract
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}