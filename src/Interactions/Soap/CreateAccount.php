<?php

namespace  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;

/**
 * Class CreateAccount
 * @package  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
class CreateAccount implements CreateAccountContract
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
        return $this->soapCommand('account create', $parameters);
    }
}