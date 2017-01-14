<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\InteractsWithSoap;
use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account\OnlineListContract;

/**
 * Class OnlineList
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
class OnlineList implements OnlineListContract
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
        return $this->soapCommand('account onlinelist', $parameters);
    }
}