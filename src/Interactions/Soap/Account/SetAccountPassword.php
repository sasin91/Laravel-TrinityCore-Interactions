<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\InteractsWithSoap;

/**
 * Class SetAccountPassword
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;
 */
class SetAccountPassword implements SetAccountPasswordContract
{
    use InteractsWithSoap;

    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters)
    {
        return $this->soapCommand("account set password", $parameters);
    }
}