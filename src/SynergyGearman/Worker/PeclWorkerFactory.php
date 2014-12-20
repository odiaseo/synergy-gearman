<?php
namespace SynergyGearman\Worker;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PeclClientFactory
 *
 * @package SynergyGearman\Client
 */
class PeclWorkerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return Pecl
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $worker = new Pecl();
        $worker->addServer('localhost');
        return $worker;
    }
}
