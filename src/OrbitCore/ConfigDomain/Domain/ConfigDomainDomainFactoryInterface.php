<?php
declare(strict_types=1);

namespace OrbitCore\ConfigDomain\Domain;


use OrbitCore\ConfigDomain\Domain\Container\ContainterInterface;

interface ConfigDomainDomainFactoryInterface
{
    public function getContainer(): ContainterInterface;
}
