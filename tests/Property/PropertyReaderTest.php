<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Tests\Property;

use Constup\ClassObjectUtils\Property\PropertyReader;
use Constup\ClassObjectUtils\Tests\Property\MockTraits\PropertyReaderMockTrait;
use PHPUnit\Framework\TestCase;

/**
 * Class PropertyReaderTest
 *
 * @package Constup\ClassObjectUtils\Tests\Property
 */
class PropertyReaderTest extends TestCase
{
    use PropertyReaderMockTrait;

    /**
     * @throws \ReflectionException
     */
    public function testGetPropertiesFromLeafClass()
    {
        foreach ($this->getPropertiesFromLeafClass_Data() as $test_case) {
            $object = $test_case['object'];

            $mock = $this->getMockBuilder(PropertyReader::class)
                ->disableOriginalConstructor()
                ->setMethods(['getPropertiesFromAllParents'])
                ->getMock();

            /** @var PropertyReader $mock */
            $result = (array_key_exists('filter', $test_case)) ?
                $mock->getPropertiesFromLeafClass($object, $test_case['filter']) :
                $mock->getPropertiesFromLeafClass($object);

            if (empty($result)) {
                $this->addToAssertionCount(1);
            } else {
                $this->assertEquals($test_case['result'], $result);
            }
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function testGetPropertiesFromAllParents()
    {
        foreach ($this->getPropertiesFromAllParents_Data() as $test_case) {
            $object = $test_case['object'];

            $mock = $this->getMockBuilder(PropertyReader::class)
                ->disableOriginalConstructor()
                ->setMethods(['getPropertiesFromLeafClass'])
                ->getMock();

            /** @var PropertyReader $mock */
            $result = (array_key_exists('filter', $test_case)) ?
                $mock->getPropertiesFromAllParents($object, $test_case['filter']) :
                $mock->getPropertiesFromAllParents($object);

            if (empty($result)) {
                $this->addToAssertionCount(1);
            } else {
                $this->assertEquals($test_case['result'], $result);
            }
        }
    }
}
