<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;


use App\Services\SoapService;

trait InteractsWithSoap
{
    /**
     * @var SoapService
     */
    protected $soap;

    /**
     * @return SoapService
     */
    protected function soap()
    {
        return $this->soap ?: $this->soap = resolve(SoapService::class);
    }

    /**
     * Call a TrinityCore SOAP service
     *
     * @param string $action
     * @param array|string $parameters
     * @return mixed
     */
    public function soapCall($action, $parameters)
    {
        return $this->soap()->call("TrinityCore.$action", $parameters);
    }

    /**
     * Fire a TrinityCore Command through the Soap service.
     *
     * @param string $action
     * @param array|string $parameters
     * @return mixed
     */
    public function soapCommand($action, $parameters)
    {
        return $this->soap()->command("TrinityCore.$action", $parameters);
    }
}