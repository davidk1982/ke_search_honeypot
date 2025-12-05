<?php

defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (ExtensionManagementUtility::isLoaded('ke_search')) {
    ExtensionManagementUtility::addTypoScriptConstants(
        '@import "EXT:ke_search_honeypot/Configuration/TypoScript/constants.typoscript"'
    );
    ExtensionManagementUtility::addTypoScriptSetup(
        '@import "EXT:ke_search_honeypot/Configuration/TypoScript/setup.typoscript"'
    );
}

