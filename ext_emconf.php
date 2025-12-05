<?php

/**
 * Extension Manager/Repository config file for ext "ke_search_honeypot".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'KeSearch HoneyPot',
    'description' => 'Spam protection for ke_search using honeypot technique. Adds an invisible form field to catch bots.',
    'category' => 'plugin',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-14.99.99',
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
    'version' => '13.4.0',
];
