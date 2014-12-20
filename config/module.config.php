<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'gearman\client\pecl' => 'SynergyGearman\Client\PeclClientFactory',
            'gearman\worker\pecl' => 'SynergyGearman\Worker\PeclWorkerFactory',
        ),
    ),
);
