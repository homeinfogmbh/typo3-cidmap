<?php

namespace Homeinfo\cidmap;

use Generator;

use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Repository\BackendUserGroupRepository;
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
            \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($group, "Group:");
            yield $group->tx_homeinfo_cid;
    }

    private function getCurrentUserGroups(): array
    {
        $query = $this->backendUserGroupRepository->createQuery();
        return $query
            ->matching(
                $query->in('uid', Self::getCurrentUserGroupUIDs())
            )
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