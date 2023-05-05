<?php

namespace Homeinfo\cidmap\Domain\Model;

class FrontendUserGroup extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
{
    /**
     * @var ?int
     */
    public $tx_homeinfo_cid;
}