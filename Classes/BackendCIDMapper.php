<?php

namespace Homeinfo\cidmap;

use Generator;

use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

use Homeinfo\cidmap\Domain\Repository\BackendUserGroupRepository;

class BackendCIDMapper
{
    private ObjectManager $objectManager;
    private BackendUserGroupRepository $backendUserGroupRepository;

    function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->backendUserGroupRepository = $this->objectManager->get(BackendUserGroupRepository::class);
    }

    public function getCurrentUserCIDs(): Generator
    {
        foreach ($this->getCurrentUserGroups() as &$group)
            if (($cid = $group->tx_homeinfo_cid) !== NULL)
                yield $cid;
    }

    private function getCurrentUserGroups(): array
    {
        if (empty($groupUIDs = Self::getCurrentUserGroupUIDs()))
            return [];

        $query = $this->backendUserGroupRepository->createQuery();
        return $query
            ->matching($query->in('uid', $groupUIDs))
            ->execute()
            ->toArray();
    }

    private static function getCurrentUserGroupUIDs(): array
    {
        if (($groupUIDs = Self::getCurrentUser()->userGroupsUID) === NULL)
            return [];

        return $groupUIDs;
    }

    private static function getCurrentUser(): BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }
}