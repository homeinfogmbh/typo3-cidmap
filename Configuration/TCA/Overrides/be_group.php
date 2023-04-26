<?php
defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('be_group',
[
   'tx_examples_options' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:examples/Resources/Private/Language/locallang_db.xlf:tx_homeinfo_cid',
      'config' => [
         'type' => 'default',
         'renderType' => 'default'
      ]
   ]
]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
   'be_group',
   'tx_homeinfo_cid',
   '',
   'after:password'
);