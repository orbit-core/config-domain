<?php
declare(strict_types=1);

namespace OrbitCoreTest\ConfigDomain\Domain;


use Codeception\TestCase\Test;
use OrbitCore\ConfigDomain\ConfigDomainConfig;
use OrbitCore\ConfigDomain\Domain\ConfigDomainDependencyProvider;
use OrbitCore\ConfigDomain\Domain\ConfigDomainDomainFactory;
use OrbitCore\ConfigDomain\Domain\ConfigDomainFacade;
use OrbitCore\ConfigDomain\Domain\Container\ConfigContainer;
use OrbitCoreTest\ConfigDomain\Domain\Hydrator\TestConfigDataHydratorPlugin;

class FacadeTest extends Test
{
    /**
     * @var \OrbitCoreTest\ConfigDomain\ConfigDomainDomainTester
     */
    protected $tester;

    public function testIntegration()
    {
        $container = new ConfigContainer();

        $facade = $this->tester->createFacade(
            [
                ConfigDomainDependencyProvider::CONFIG_CONTAINER => $container,
                ConfigDomainDependencyProvider::CONFIG_DATA_HYDRATOR_PLUGINS => [
                    new TestConfigDataHydratorPlugin()
                ]
            ]
        );

        $facade->init();

        $this->assertSame(
            'bar',
            $facade->getConfigValue('foo')
        );
    }


}
