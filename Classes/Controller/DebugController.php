<?php

namespace Homeinfo\cidmap\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class DebugController extends ActionController
{
    public function debugAction()
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['BE_USER']->userGroupsUID, 'User Groups:');
    }
}