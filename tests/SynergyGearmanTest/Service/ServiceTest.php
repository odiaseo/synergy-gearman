<?php
namespace SynergyGearmanTest\Service;

use SynergyGearmanTest\Bootstrap;

/**
 * @backupGlobals disabled
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Zend\ServiceManager\ServiceManager */
    protected $serviceManager;

    public function setUp()
    {
        parent::setUp();
        $this->serviceManager = Bootstrap::getServiceManager();

    }

    public function testClientInstance()
    {
        $client = $this->serviceManager->get('gearman\client\pecl');
        $worker = $this->serviceManager->get('gearman\worker\pecl');

        $this->assertInstanceOf('SynergyGearman\Client\Pecl', $client);
        $this->assertInstanceOf('SynergyGearman\Worker\Pecl', $worker);
    }
}
