<?php
defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'fe_groups',
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
   'fe_groups',
   'tx_homeinfo_cid'
);