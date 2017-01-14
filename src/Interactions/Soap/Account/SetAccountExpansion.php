<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account\SetAccountExpansionContract;
use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\InteractsWithSoap;

/**
 * Class SetExpansion
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;
 */
class SetAccountExpansion implements SetAccountExpansionContract
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
        return $this->soapCommand("account set addon", $parameters);
    }
}