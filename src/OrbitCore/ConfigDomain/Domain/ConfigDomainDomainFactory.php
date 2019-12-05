<?php
declare(strict_types=1);

namespace OrbitCore\ConfigDomain\Domain;

use OrbitCore\ConfigDomain\Domain\Container\ContainterInterface;
use OrbitCore\ConfigDomain\Domain\Hydrator\ConfigDataHydrator;
use OrbitCore\ConfigDomain\Domain\Hydrator\ConfigDataHydratorInterface;
use OrbitCore\Infrastructure\Factory\Domain\AbstractDomainFactory;

class ConfigDomainDomainFactory extends AbstractDomainFactory implements ConfigDomainDomainFactoryInterface
{
    /**
     * @var ContainterInterface
     */
    protected $container;

    public function getContainer(): ContainterInterface
    {
        return $this->getDependency(ConfigDomainDependencyProvider::CONFIG_CONTAINER);
    }

    public function createHydrator(): ConfigDataHydratorInterface
    {
        return new ConfigDataHydrator(
            $this->getContainer(),
            $this->getDependency(ConfigDomainDependencyProvider::CONFIG_DATA_HYDRATOR_PLUGINS)
        );
    }
}
