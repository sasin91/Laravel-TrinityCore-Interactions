<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account\SetGMLevelContract;
use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\InteractsWithSoap;

/**
 * Class SetGMLevel
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;
 */
class SetGMLevel implements SetGMLevelContract
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
        return $this->soapCommand("account set gmlevel", $parameters);
    }
}