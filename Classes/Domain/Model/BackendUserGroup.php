<?php

namespace Homeinfo\cidmap\Domain\Model;

class BackendUserGroup extends \TYPO3\CMS\Extbase\Domain\Model\BackendUserGroup
{
    /**
     * @var ?int
     */
    protected $tx_homeinfo_cid = NULL;
}