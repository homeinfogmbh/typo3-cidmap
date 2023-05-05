<?php
defined('TYPO3_MODE') || die();


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'cidmap',
    'debugBackend',
    '',
    '',
    [
        \Homeinfo\cidmap\Controller\DebugController::class => 'debugBackend',
    ],
    [
        'access' => 'user',
        'labels' => 'Debug Backend',
        'inheritNavigationComponentFromMainModule' => false,
        'standalone' => true,
    ]
);