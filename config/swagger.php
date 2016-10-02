<?php
use Cake\Core\Configure;

return [
    'Swagger' => [
        'ui' => [
            'title' => 'Developers',
            'validator' => true,
            'api_selector' => false,
            'route' => '/developers/',
            'schemes' => ['http', 'https']
        ],
        /*'docs' => [
            'crawl' => true,
            'route' => '/developers/docs/',
            'cors' => [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST',
                'Access-Control-Allow-Headers' => 'X-Requested-With'
            ]
        ],*/
    ]
];