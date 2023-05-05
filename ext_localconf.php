<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'cidmap',
    'Debug',
    [
        \Homeinfo\cidmap\Controller\DebugController::class => 'debugBackend',
        \Homeinfo\cidmap\Controller\DebugController::class => 'debugFrontend',
    ],
);