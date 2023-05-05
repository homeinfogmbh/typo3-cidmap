<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'cidmap',
    'DebugBackend',
    [
        \Homeinfo\cidmap\Controller\DebugController::class => 'debugBackend'
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'cidmap',
    'DebugFrontend',
    [
        \Homeinfo\cidmap\Controller\DebugController::class => 'debugFrontend'
    ]
);