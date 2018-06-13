<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Property;

use ReflectionClass;

/**
 * Class PropertyReader
 *
 * @package Constup\ClassObjectUtils\Property
 */
class PropertyReader
{
    /**
     * @param $object
     * @param int|null $filter
     *
     * @throws \ReflectionException
     *
     * @return array
     */
    public function getPropertiesFromAllParents($object, int $filter = null): array
    {
        $result = [];
        $reflection = new ReflectionClass($object);
        do {
            $properties = [];
            $reflection_properties = (!empty($filter)) ? $reflection->getProperties($filter) : $reflection->getProperties();
            foreach ($reflection_properties as $property) {
                $property->setAccessible(true);
                $properties[ $property->getName() ] = $property->getValue($object);
            }
            $result = array_merge($properties, $result);
        } while ($reflection = $reflection->getParentClass());

        return $result;
    }

    /**
     * @param $object
     * @param int|null $filter
     *
     * @throws \ReflectionException
     *
     * @return array
     */
    public function getPropertiesFromLeafClass($object, int $filter = null): array
    {
        $result = [];
        $reflection = new ReflectionClass($object);
        $properties = (!empty($filter)) ? $reflection->getProperties($filter) : $reflection->getProperties();
        foreach ($properties as $property) {
            if ($property->class == get_class($object)) {
                $property->setAccessible(true);
                $result[ $property->getName() ] = $property->getValue($object);
            }
        }

        return $result;
    }
}
