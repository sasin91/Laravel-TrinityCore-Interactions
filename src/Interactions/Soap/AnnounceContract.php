<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;

use Sasin91\LaravelInteractions\Interactions\Interactable;

/**
 * Class AnnounceContract
 * @package Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
 */
interface AnnounceContract extends Interactable
{
    /**
     * Handle the interaction.
     *
     * @param mixed $parameters
     * @return mixed
     */
    public function handle($parameters);
}