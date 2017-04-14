<?php

namespace  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;

/**
 * Class CreateAccountContract
 * @package  Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
interface CreateAccountContract
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}