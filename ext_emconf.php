<?php

/**
 * Extension Manager/Repository config file for ext "ke_search_honeypot".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'KeSearch HoneyPot',
    'description' => '',
    'category' => 'plugin',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.9.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'DavidKohr\\KeSearchHoneypot\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'David Kohr',
    'author_email' => 't3@davidkohr.de',
    'author_company' => 'David Kohr',
    'version' => '11.5.2',
];
