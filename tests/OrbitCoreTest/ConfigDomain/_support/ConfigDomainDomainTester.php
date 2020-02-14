<?php

namespace OrbitCoreTest\ConfigDomain;

use Codeception\Stub;
use OrbitCore\ConfigDomain\Domain\ConfigDomainDependencyProvider;
use OrbitCore\ConfigDomain\Domain\ConfigDomainDomainFactory;
use OrbitCore\ConfigDomain\Domain\ConfigDomainFacade;
use OrbitCore\Infrastructure\Container\ContainerInterface;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class ConfigDomainDomainTester extends \Codeception\Actor
{
    use _generated\ConfigDomainDomainTesterActions;

    public function createFacade(array $dependencies = [])
    {
        $factory = $this->createFactory($dependencies);

        $facade = new ConfigDomainFacade();
        $facade->setResolver(
            $this->createResolver(
                null,
                null,
                $factory
            )
        );

        return $facade;
    }

    /**
     * @param array $dependencies
     *
     * @return \OrbitCore\ConfigDomain\Domain\ConfigDomainDomainFactory
     * @throws \Exception
     */
    public function createFactory(array $dependencies = [])
    {
        $factory = new ConfigDomainDomainFactory();
        $factory->setResolver(
            $this->createResolver(
                null,
                new ConfigDomainDependencyProvider(),
                null
            )
        );

        /** @var \OrbitCore\Infrastructure\Container\ContainerInterface $container */
        $container = Stub::makeEmpty(
            ContainerInterface::class,
            [
                'get' => function ($name) use ($dependencies) {
                    return $dependencies[$name] ?? null;
                }
            ]
        );


        $factory->setDependencyContainer($container);

        return $factory;
    }
}
