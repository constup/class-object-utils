<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Tests\Property;

use Constup\ClassObjectUtils\PHPUnit\AbstractTestCase;
use Constup\ClassObjectUtils\Property\PropertyValidator;
use Constup\ClassObjectUtils\Tests\Property\MockTraits\PropertyValidatorMockTrait;

/**
 * Class PropertyValidatorTest
 *
 * @package Constup\ClassObjectUtils\Tests\Property
 */
class PropertyValidatorTest extends AbstractTestCase
{
    use PropertyValidatorMockTrait;

    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testValidateAllPropertiesArePopulated()
    {
        foreach ($this->validateAllPropertiesArePopulated_ValidData() as $test_case) {
            $object = $test_case['object'];

            $mock = $this->getMockBuilder(PropertyValidator::class)
                ->disableOriginalConstructor()
                ->setMethods(['validatePropertiesArePopulated'])
                ->getMock();

            /* @var PropertyValidator $mock **/
            $mock->validateAllPropertiesArePopulated(
                $object,
                array_key_exists('filter', $test_case) ? $test_case['filter'] : null,
                array_key_exists('can_be_null', $test_case) ? $test_case['can_be_null'] : [],
                array_key_exists('include_parents', $test_case) ? $test_case['include_parents'] : true
            );
            $this->addToAssertionCount(1);
        }

        foreach ($this->validateAllPropertiesArePopulated_InvalidData() as $test_case) {
            $object = $test_case['object'];

            $mock = $this->getMockBuilder(PropertyValidator::class)
                         ->disableOriginalConstructor()
                         ->setMethods(['validatePropertiesArePopulated'])
                         ->getMock();

            /* @var PropertyValidator $mock **/
            $this->assertThrowsException(
                $test_case['result']['exception'],
                function () use ($mock, $object, $test_case) {
                    $mock->validateAllPropertiesArePopulated(
                        $object,
                        array_key_exists('filter', $test_case) ? $test_case['filter'] : null,
                        array_key_exists('can_be_null', $test_case) ? $test_case['can_be_null'] : [],
                        array_key_exists('include_parents', $test_case) ? $test_case['include_parents'] : true
                    );
                }
            );
            $this->assertThrowsExceptionMessage(
                $test_case['result']['exception_message'],
                function () use ($mock, $object, $test_case) {
                    $mock->validateAllPropertiesArePopulated(
                        $object,
                        array_key_exists('filter', $test_case) ? $test_case['filter'] : null,
                        array_key_exists('can_be_null', $test_case) ? $test_case['can_be_null'] : [],
                        array_key_exists('include_parents', $test_case) ? $test_case['include_parents'] : true
                    );
                }
            );
        }
    }

    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testValidatePropertiesArePopulated()
    {
        foreach ($this->validatePropertiesArePopulated_ValidData() as $test_case) {
            $object = $test_case['object'];

            $mock = $this->getMockBuilder(PropertyValidator::class)
                ->disableOriginalConstructor()
                ->setMethods(['validateAllPropertiesArePopulated'])
                ->getMock();

            /* @var PropertyValidator $mock */
            $mock->validatePropertiesArePopulated($object, $test_case['properties']);
            $this->addToAssertionCount(1);
        }

        foreach ($this->validatePropertiesArePopulated_InvalidData() as $test_case) {
            $object = $test_case['object'];

            $mock = $this->getMockBuilder(PropertyValidator::class)
                         ->disableOriginalConstructor()
                         ->setMethods(['validateAllPropertiesArePopulated'])
                         ->getMock();

            /* @var PropertyValidator $mock */
            $this->assertThrowsException(
                $test_case['result']['exception'],
                function () use ($mock, $object, $test_case) {
                    $mock->validatePropertiesArePopulated($object, $test_case['properties']);
                }
            );
            $this->assertThrowsExceptionMessage(
                $test_case['result']['exception_message'],
                function () use ($mock, $object, $test_case) {
                    $mock->validatePropertiesArePopulated($object, $test_case['properties']);
                }
            );
        }
    }
}
