<?php
namespace SynergyGearman\Client;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PeclClientFactory
 *
 * @package SynergyGearman\Client
 */
class PeclClientFactory implements FactoryInterface
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
