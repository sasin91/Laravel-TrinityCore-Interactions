<?php

namespace  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account;

use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\InteractsWithSoap;

/**
 * Class DeleteAccount
 * @package  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
class DeleteAccount implements DeleteAccountContract
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
        return $this->soapCommand('account delete', $parameters);
    }
}