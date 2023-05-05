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
        'labels' => 'LLL:EXT:cidmap/Resources/Private/Language/locallang_be.xlf:usercids.label',
        'inheritNavigationComponentFromMainModule' => false,
        'standalone' => true,
    ]
);