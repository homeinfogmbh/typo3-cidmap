<?php

namespace Homeinfo\cidmap;

use Generator;

use TYPO3\CMS\Core\Authentication\FrontendUserAuthentication;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

use Homeinfo\cidmap\Domain\Repository\FrontendUserGroupRepository;

class FrontendCIDMapper
{
    private ObjectManager $objectManager;
    private FrontendUserGroupRepository $frontendUserGroupRepository;

    function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->frontendUserGroupRepository = $this->objectManager->get(FrontendUserGroupRepository::class);
    }

    public function getCurrentUserCIDs(): Generator
    {
        foreach ($this->getCurrentUserGroups() as &$group)
            if (($cid = $group->tx_homeinfo_cid) !== NULL)
                yield $cid;
    }

    private function getCurrentUserGroups(): array
    {
        $query = $this->frontendUserGroupRepository->createQuery();
        return $query
            ->matching(
                $query->in('uid', Self::getCurrentUserGroupUIDs())
            )
            ->execute()
            ->toArray();
    }

    private static function getCurrentUserGroupUIDs(): array
    {
        if (($groupUIDs = Self::getCurrentUser()->userGroups) === NULL)
            return [];

        return $groupUIDs;
    }

    private static function getCurrentUser(): FrontendUserAuthentication
    {
        return $GLOBALS['TSFE']->fe_user;
    }
}