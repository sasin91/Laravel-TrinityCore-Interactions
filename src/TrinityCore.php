<?php

namespace Sasin91\LaravelTrinityCoreInteractions;


use Illuminate\Support\Str;
use Sasin91\LaravelTrinityCoreInteractions\Services\SoapService;

class TrinityCore
{
    /**
     * The method to call on a given interaction class.
     *
     * @var string
     */
    protected $method = 'handle';

    /**
     * Array of swapped interactions
     *
     * @var array
     */
    protected $swapped = [];

    /**
     * Swap an interaction.
     *
     * @param string   $interaction
     * @param callable $implementation
     * @return $this
     */
    public function swap($interaction, callable $implementation)
    {
        $this->swapped[$interaction] = $implementation;

        return $this;
    }

    /**
     * Whether a given interaction is swapped.
     *
     * @param string $interaction
     * @return bool
     */
    public function isSwapped($interaction)
    {
        return isset($this->swapped[$interaction]);
    }

    /**
     * Get a swapped interaction.
     *
     * @param string $interaction
     * @return callable|\Closure
     */
    protected function getSwapped($interaction)
    {
        return $this->swapped[$interaction];
    }

    /**
     * Alias for Interact.
     *
     * @param string $interaction
     * @param array $parameters
     */
    public function call($interaction, array $parameters = [])
    {
        return $this->interact($interaction, $parameters);
    }

    /**
     * Call given interaction
     *
     * @param string $interaction
     * @param array $parameters
     * @return mixed
     */
    public function interact(string $interaction, array $parameters = [])
    {
        // First we'll check to see if given interaction is a string containing an @method notion.
        // if so, reassign $interaction and assign $method.
        list($interaction, $method) = Str::parseCallback($interaction);

        // Next we'll check to see if given $interaction is a swapped interaction,
        // if so, call the swap.
        if ($this->isSwapped($interaction)) {
            return app()->makeWith($this->getSwapped($interaction), [$parameters]);
        }

        // Finally we'll call the interaction,
        // deferring to the actual instantiation to the Illuminate Container.
        $method = $method ?? $this->method;
        return app()->call($interaction.'@'.$method, [$parameters]);
    }

    /**
     * Fire a one-off SOAP command.
     *
     * @param string|null $command
     * @param array ...$parameters
     * @return string|SoapService   Soap::call response string.
     */
    public function soap(string $command = null, ...$parameters)
    {
        $service = app()->make(SoapService::class);

        if (! $command) {
            return $service;
        }

        return $service->command("TrinityCore.{$command}", $parameters);
    }
}