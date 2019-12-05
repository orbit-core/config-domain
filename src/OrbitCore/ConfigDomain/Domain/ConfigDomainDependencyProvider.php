<?php
declare(strict_types=1);

namespace OrbitCore\ConfigDomain\Domain;


use OrbitCore\ConfigDomain\Domain\Container\ConfigContainer;
use OrbitCore\Infrastructure\Container\ContainerInterface;
use OrbitCore\Infrastructure\Dependency\Domain\AbstractDomainDependencyProvider;

class ConfigDomainDependencyProvider extends AbstractDomainDependencyProvider
{
    public const CONFIG_CONTAINER = 'CONFIG_CONTAINER';
    public const CONFIG_DATA_HYDRATOR_PLUGINS = 'CONFIG_DATA_HYDRATOR_PLUGINS';

    /**
     * @param \OrbitCore\Infrastructure\Container\ContainerInterface $container
     *
     * @return \OrbitCore\Infrastructure\Container\ContainerInterface
     */
    public function provideDomainDependencies(ContainerInterface $container): ContainerInterface
    {
        $container = $this->addConfigContainer($container);
        $container = $this->addConfigDataHydratorPlugins($container);

        return $container;
    }

    protected function addConfigContainer(ContainerInterface $container): ContainerInterface
    {
        $container->set(static::CONFIG_CONTAINER, function (ContainerInterface $container) {
            return new ConfigContainer();
        });

        return $container;
    }

    protected function addConfigDataHydratorPlugins(ContainerInterface $container): ContainerInterface
    {
        $container->set(static::CONFIG_DATA_HYDRATOR_PLUGINS, function (ContainerInterface $container) {
            return $this->getConfigDataHydratorPlugins();
        });

        return $container;
    }

    protected function getConfigDataHydratorPlugins(): array
    {
        return [];
    }
}
