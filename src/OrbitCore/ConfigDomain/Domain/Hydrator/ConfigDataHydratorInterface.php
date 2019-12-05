<?php
declare(strict_types=1);

namespace OrbitCore\ConfigDomain\Domain\Hydrator;

interface ConfigDataHydratorInterface
{
    public function hydrateConfigData(): void;
}
