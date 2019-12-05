<?php
declare(strict_types=1);

namespace OrbitCoreTest\ConfigDomain\Domain\Container;


use Codeception\TestCase\Test;
use OrbitCore\ConfigDomain\Domain\Container\ConfigContainer;
use OrbitCore\Infrastructure\Config\Exception\ConfigNotExistException;

/**
 * @group OrbitCore
 * @group ConfigDomain
 * @group Domain
 * @group Container
 * @group ConfigContainerTest
 */
class ConfigContainerTest extends Test
{
    /**
     * @var \OrbitCoreTest\ConfigDomain\ConfigDomainDomainTester
     */
    protected $tester;

    public function testConfigContainer()
    {
        $container = new ConfigContainer();

        $container->set('foo', 'bar');

        $this->assertSame(
            'bar',
            $container->get('foo')
        );
    }

    public function testConfigContainerException()
    {
        $container = new ConfigContainer();

        $this->expectException(ConfigNotExistException::class);

        $container->get('foo');
    }
}
