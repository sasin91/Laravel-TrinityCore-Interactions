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

    /**
     * Fire a SOAP Call.
     *
     * @param $action
     * @param $parameters
     * @return mixed
     */
    public function call($action, $parameters)
    {
        $response = $this->soap->call($action, Arr::wrap($parameters));

        return $this->parseResponse($response);
    }

    /**
     * Fire a SOAP Command.
     *
     * @param $command
     * @param $parameters
     * @return mixed
     */
    public function command($command, $parameters)
    {
        list($client, $call) = explode('.', $command);

        $response = $this->soap->client($client, function (Client $client) use ($call, $parameters) {
            $command = $call.' '.implode(' ', $parameters);

            return $client->executeCommand(new \SoapParam($command, 'command'));
        });

        return $this->parseResponse($response);
    }

    /**
     * Parse the SOAP response.
     *
     * @param $response
     * @return mixed|string
     */
    protected function parseResponse($response)
    {
        if (is_string($response)) {
            return trim(str_replace(PHP_EOL, '', $response));
        }

        return value($response);
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