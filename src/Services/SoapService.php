<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Services;


use Artisaninweb\SoapWrapper\Client;
use Artisaninweb\SoapWrapper\Service;
use Artisaninweb\SoapWrapper\SoapWrapper;
use Illuminate\Support\Arr;

class SoapService
{
    /**
     * The Soap wrapper.
     *
     * @var SoapWrapper
     */
    protected $soap;

    /**
     * The SOAP Service configurations.
     *
     * @var array
     */
    protected $config = [];

    /**
     * SoapService constructor.
     *
     * @param SoapWrapper   $soap
     * @param array         $config
     */
    public function __construct(SoapWrapper $soap, array $config)
    {
        $this->soap = $soap;
        $this->config = $config;
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
                ->options(Arr::get($this->config, 'options'));
        });
    }
}