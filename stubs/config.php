<?php return [
    'options'    =>  [
        'location'  =>  env('SOAP_LOCATION', 'http://127.0.0.1:7878'),
        'uri'       =>  env('SOAP_URI', 'urn:TC'),
        'style'     =>  env('SOAP_STYLE', SOAP_RPC),
        'login'     =>  env('SOAP_USER', 'admin'),
        'password'  =>  env('SOAP_PASS', 'admin')
    ]
];