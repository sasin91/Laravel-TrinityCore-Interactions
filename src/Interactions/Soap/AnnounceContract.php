<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;


/**
 * Class AnnounceContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
interface AnnounceContract
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}