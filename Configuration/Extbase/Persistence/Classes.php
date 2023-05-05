<?php
declare(strict_types = 1);

return [
    \Homeinfo\cidmap\Domain\Model\BackendUserGroup::class => [
        'tableName' => 'be_groups',
        'properties' => [
            'tx_homeinfo_cid' => [
                'fieldName' => 'tx_homeinfo_cid'
            ]
        ]
    ],
    \Homeinfo\cidmap\Domain\Model\FrontendUserGroup::class => [
        'tableName' => 'fe_groups',
        'properties' => [
            'tx_homeinfo_cid' => [
                'fieldName' => 'tx_homeinfo_cid'
            ]
        ]
    ]
];
