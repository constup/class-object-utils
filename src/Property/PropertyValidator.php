<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Property;

use Exception;

/**
 * Class PropertyValidator
 *
 * @package Constup\ClassObjectUtils\Property
 */
class PropertyValidator
{
    /**
     * @param $object
     * @param int|null $filter
     * @param array    $can_be_null
     * @param bool     $include_parents
     *
     * @throws \ReflectionException
     * @throws Exception
     */
    public function validateAllPropertiesArePopulated(
        $object,
        int $filter = null,
        array $can_be_null = [],
        bool $include_parents = true
    ): void {
        $property_reader = new PropertyReader();

        if ($include_parents === true) {
            $properties = $property_reader->getPropertiesFromAllParents($object, $filter);
        } else {
            $properties = $property_reader->getPropertiesFromLeafClass($object, $filter);
        }

        foreach ($properties as $name => $value) {
            if ($value === null && !in_array($name, $can_be_null)) {
                throw new Exception("Property $name is null. Did you forget to set it?");
            }
        }
    }

    /**
     * @param $object
     * @param array $properties
     *
     * @throws \ReflectionException
     * @throws Exception
     */
    public function validatePropertiesArePopulated(
        $object,
        array $properties
    ): void {
        $property_reader = new PropertyReader();
        $class_name = get_class($object);

        $all_properties = $property_reader->getPropertiesFromAllParents($object);
        $all_property_names = [];
        foreach ($all_properties as $name => $value) {
            $all_property_names[] = $name;
        }

        foreach ($properties as $property) {
            if (!in_array($property, $all_property_names)) {
                throw new Exception("Property $property does not belong to $class_name.");
            }

            if ($all_properties[$property] === null) {
                throw new Exception("Property $property is null. Did you forget to set it?");
            }
        }
    }
}
