<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

/**
 * Class OnlineListContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
interface OnlineListContract
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}