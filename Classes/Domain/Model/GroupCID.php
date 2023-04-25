<?php

namespace Homeinfo\Pinlogin\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class GroupCID extends AbstractEntity
{
    /**
     * @var int $pid
     */
    public $pid;

    /**
     * @var int $cid
     */
    public $cid;
}