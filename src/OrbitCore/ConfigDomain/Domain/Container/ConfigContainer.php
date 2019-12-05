<?php
declare(strict_types=1);

namespace OrbitCore\ConfigDomain\Domain\Container;


use OrbitCore\Infrastructure\Config\Exception\ConfigNotExistException;

class ConfigContainer implements ContainterInterface, \ArrayAccess
{
    /**
     * @var array
     */
    protected $config;

    /**
     * ConfigContainer constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name)
    {
        return $this->offsetGet($name);
    }

    public function set(string $name, $config)
    {
        $this->offsetSet($name, $config);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new ConfigNotExistException(sprintf(
                'Config with name "%s" does not exist',
                $offset
            ));
        }

        return $this->config[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->config[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->config[$offset]);
    }
}
