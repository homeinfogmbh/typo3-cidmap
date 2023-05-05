<?php

namespace Homeinfo\cidmap\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

use Homeinfo\cidmap\BackendCIDMapper;

class DebugController extends ActionController
{
    public function debugAction()
    {
        $cidMapper = new BackendCIDMapper();
        $cids = iterator_to_array($cidMapper->getCurrentUserCIDs());

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['BE_USER'], "Backend User:");
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($cids, "Current user's CIDs:");
    }
}