<?php

namespace Homeinfo\cidmap;

use Generator;

use TYPO3\CMS\Beuser\Domain\Repository\BackendUserGroupRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

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
            yield $group->tx_homeinfo_cid;
    }

    private function getCurrentUserGroups(): array
    {
        $query = $this->backendUserGroupRepository->createQuery();
        return $query
            ->matching(
                $query->in('uid', Self::getCurrentUserGroupUIDs())
            )->executeQuery()->fetchAll();
    }

    private static function getCurrentUserGroupUIDs(): array
    {
        if (($groupUIDs = Self::getCurrentUser()->userGroupsUID) === NULL)
            return [];

        return $groupUIDs;
    }

    private static function getCurrentUser(): array
    {
        return $GLOBALS['BE_USER'];
    }
}