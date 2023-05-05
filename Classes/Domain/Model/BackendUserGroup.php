<?php

namespace Homeinfo\cidmap\Domain\Model;

class BackendUserGroup extends \TYPO3\CMS\Extbase\Domain\Model\BackendUserGroup
{
    /**
     * @var ?int
     */
    public $tx_homeinfo_cid;
}