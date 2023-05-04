<?php
defined('TYPO3_MODE') || die();


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'cidmap',
    'cidmap',
    '',
    '',
    [
        \Homeinfo\cidmap\Controller\DebugController::class => 'debug',
    ],
    [
        'access' => 'user',
        'labels' => 'Debug',
        'inheritNavigationComponentFromMainModule' => false,
        'standalone' => true,
    ]
);