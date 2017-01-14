<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Services;


use Artisaninweb\SoapWrapper\Client;
use Artisaninweb\SoapWrapper\Service;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SoapService
{
    /**
     * @var SoapWrapper
     */
    protected $soap;

    /**
     * SoapService constructor.
     *
     * @param SoapWrapper $soap
     */
    public function __construct(SoapWrapper $soap)
    {
        $this->soap = $soap;
        $this->registerTrinityCoreService();
    }

    public function call($action, $parameters)
    {
        return $this->soap->call($action, $this->parseParameters($parameters));
    }

    public function command($command, $parameters)
    {
        list($client, $call) = explode('.', $command);

        return $this->soap->client($client, function (Client $client) use ($call, $parameters) {
            $command = $call.' '.implode(' ', $parameters);

            return $client->executeCommand(new \SoapParam($command, 'command'));
        });
    }

    protected function parseParameters(&$parameters)
    {
        return is_array($parameters)
            ? $parameters
            : (array) $parameters;
    }

    protected function registerTrinityCoreService()
    {
        $this->soap->add('TrinityCore', function (Service $service) {
            return $service
                ->cache(WSDL_CACHE_MEMORY)
                ->options(config('TrinityCore.options'));
        });
    }
}