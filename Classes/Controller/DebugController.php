<?php

namespace Homeinfo\cidmap\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

use Homeinfo\cidmap\BackendCIDMapper;
use Homeinfo\cidmap\FrontendCIDMapper;

class DebugController extends ActionController
{
    public function debugBackendAction()
    {
        $cidMapper = new BackendCIDMapper();
        $cids = iterator_to_array($cidMapper->getCurrentUserCIDs());
        $this->view->assign('cids', $cids);
    }

    public function debugFrontendAction()
    {
        $cidMapper = new FrontendCIDMapper();
        $cids = iterator_to_array($cidMapper->getCurrentUserCIDs());
        $this->view->assign('cids', $cids);
    }
}