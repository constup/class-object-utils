<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Property;

use Closure;

/**
 * Class PrivateProtected
 *
 * @package Constup\ClassObjectUtils\Property
 */
class PrivateProtected
{
    /**
     * Invoke private or protected method with parameters. Useful for PHPUnit tests, dangerous for pretty much anything
     * else.
     *
     * @param $object
     * @param string $method_name
     * @param array  $parameters
     *
     * @throws \ReflectionException
     *
     * @return mixed
     */
    public function invokeMethod($object, string $method_name, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($method_name);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Read a private or protected property value without reflection. Useful in PHPUnit tests, dangerous pretty much
     * anywhere else.
     *
     * @return Closure
     */
    public function propertyReader(): Closure
    {
        return function &($object, $property) {
            $value = &Closure::bind(function &() use ($property) {
                return $this->$property;
            }, $object, $object)->__invoke();

            return $value;
        };
    }
}
