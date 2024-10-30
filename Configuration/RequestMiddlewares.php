<?php

return [
    'frontend' => [
        'davidkohr/ke-search-honeypot/honeypot-middleware' => [
            'target' => DavidKohr\KeSearchHoneypot\Middleware\HoneypotMiddleware::class,
            'before' => [
                'typo3/cms-frontend/base-redirect-resolver'
            ],
        ],
    ]
];


