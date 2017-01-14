<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelInteractions\Interactions\Interactable;

/**
 * Class OnlineListContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
interface OnlineListContract extends Interactable
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}