<?php
defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'be_groups',
    [
        'tx_homeinfo_cid' => [
            'exclude' => 0,
            'config' => [
                'type' => 'input'
            ],
            'label' => 'LLL:EXT:cidmap/Resources/Private/Language/locallang_db.xlf:tx_homeinfo_cid'
        ]
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
   'be_groups',
   'tx_homeinfo_cid',
);

$GLOBALS['TCA']['be_groups']['palettes']['tx_homeinfo_cid'] = [
    'showitem' => 'tx_homeinfo_cid'
];