<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Tests\Property\MockTraits;

use Constup\ClassObjectUtils\Tests\Property\SampleObjects\PropertyValidatorSampleObject;
use Exception;
use ReflectionProperty;

/**
 * Trait PropertyValidatorMockTrait
 *
 * @package Constup\ClassObjectUtils\Tests\Property\MockTraits
 */
trait PropertyValidatorMockTrait
{
    protected function validateAllPropertiesArePopulated_ValidData(): array
    {
        return [
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'can_be_null' => ['property3'],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'can_be_null' => ['property3', 'property6'],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'can_be_null' => ['property3', 'sample_abstract_property2'],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789),
                'can_be_null' => ['property3', 'sample_abstract_property5'],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample'),
                'can_be_null' => ['property3'],
                'include_parents' => false,
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2']),
                'can_be_null' => ['property3'],
                'filter' => ReflectionProperty::IS_PRIVATE,
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true),
                'can_be_null' => ['property3'],
                'include_parents' => false,
                'filter' => ReflectionProperty::IS_PRIVATE,
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty5(234),
                'can_be_null' => ['sample_abstract_property4'],
                'filter' => ReflectionProperty::IS_PROTECTED,
            ],
        ];
    }

    protected function validateAllPropertiesArePopulated_InvalidData(): array
    {
        return [
            [
                'object' => new PropertyValidatorSampleObject(),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty5('more samples'),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789),
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'can_be_null' => ['property2'],
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    protected function validatePropertiesArePopulated_ValidData(): array
    {
        return [
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'properties' => [
                    'property1',
                    'property2',
                    'property3',
                    'property4',
                    'property5',
                    'property6',
                    'sample_abstract_property1',
                    'sample_abstract_property2',
                    'sample_abstract_property3',
                    'sample_abstract_property4',
                    'sample_abstract_property5',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty5(234)
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789),
                'properties' => [
                    'property1',
                    'property3',
                    'property5',
                    'sample_abstract_property3',
                    'sample_abstract_property4',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    protected function validatePropertiesArePopulated_InvalidData(): array
    {
        return [
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'properties' => [
                    'property1',
                    'property2',
                    'property3',
                    'property4',
                    'property5',
                    'property6',
                    'sample_abstract_property1',
                    'sample_abstract_property2',
                    'sample_abstract_property3',
                    'sample_abstract_property4',
                    'sample_abstract_property5',
                ],
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'properties' => [
                    'property1',
                    'property2',
                    'property4',
                    'property5',
                    'property6',
                    'sample_abstract_property1',
                    'sample_abstract_property2',
                    'sample_abstract_property3',
                    'sample_abstract_property4',
                    'sample_abstract_property5',
                ],
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'properties' => [
                    'property1',
                    'property2',
                    'property4',
                    'property5',
                    'property6',
                    'sample_abstract_property1',
                    'sample_abstract_property2',
                    'sample_abstract_property3',
                    'sample_abstract_property4',
                    'sample_abstract_property5',
                ],
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty5('more samples'),
                'properties' => [
                    'property1',
                    'property2',
                    'property4',
                    'property5',
                    'property6',
                    'sample_abstract_property1',
                    'sample_abstract_property2',
                    'sample_abstract_property3',
                    'sample_abstract_property4',
                    'sample_abstract_property5',
                ],
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789),
                'properties' => [
                    'property1',
                    'property2',
                    'property4',
                    'property5',
                    'property6',
                    'sample_abstract_property1',
                    'sample_abstract_property2',
                    'sample_abstract_property3',
                    'sample_abstract_property4',
                    'sample_abstract_property5',
                ],
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'is null. Did you forget to set it?',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty2('sample')
                    ->setProperty3(['test' => 'sample'])
                    ->setProperty4(true)
                    ->setProperty5(234)
                    ->setProperty6('another sample')
                    ->setSampleAbstractProperty1(456)
                    ->setSampleAbstractProperty2('yet another sample')
                    ->setSampleAbstractProperty3(['test2' => 'sample2'])
                    ->setSampleAbstractProperty4(789)
                    ->setSampleAbstractProperty5('more samples'),
                'properties' => [
                    'non_existing_property',
                ],
                'result' => [
                    'exception' => Exception::class,
                    'exception_message' => 'Property non_existing_property does not belong to Constup\ClassObjectUtils\Tests\Property\SampleObjects\PropertyValidatorSampleObject.',
                ],
            ],
        ];
    }
}
