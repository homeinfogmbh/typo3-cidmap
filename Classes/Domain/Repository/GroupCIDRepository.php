<?php

namespace Homeinfo\Pinlogin\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class PINRepository extends Repository
{
    public function findByGroupAndPid(
        int $group,
        int $pid
    ): QueryResultInterface
    {
        $query = $this->createQuery();
        return $query
            ->matching(
                $query->logicalAnd(
                    $query->equals('group', $group),
                    $query->equals('pid', $pid)
                )
            )
            ->execute();
    }
}
