<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Tests\Property\MockTraits;

use Constup\ClassObjectUtils\Tests\Property\SampleObjects\PropertyValidatorSampleObject;

/**
 * Trait PropertyReaderMockTrait
 *
 * @package Constup\ClassObjectUtils\Tests\Property\MockTraits
 */
trait PropertyReaderMockTrait
{
    protected function getPropertiesFromAllParents_Data(): array
    {
        return [
            [
                'object' => new PropertyValidatorSampleObject(),
                'result' => [
                    'property1' => null,
                    'property2' => null,
                    'property3' => null,
                    'property4' => null,
                    'property5' => null,
                    'property6' => null,
                    'sample_abstract_property1' => null,
                    'sample_abstract_property2' => null,
                    'sample_abstract_property3' => null,
                    'sample_abstract_property4' => null,
                    'sample_abstract_property5' => null,
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty3(['test' => 123]),
                'result' => [
                    'property1' => 123,
                    'property2' => null,
                    'property3' => ['test' => 123],
                    'property4' => null,
                    'property5' => null,
                    'property6' => null,
                    'sample_abstract_property1' => null,
                    'sample_abstract_property2' => null,
                    'sample_abstract_property3' => null,
                    'sample_abstract_property4' => null,
                    'sample_abstract_property5' => null,
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty2('sample2')
                    ->setProperty5(234)
                    ->setProperty6('sample3'),
                'result' => [
                    'property1' => null,
                    'property2' => 'sample2',
                    'property3' => null,
                    'property4' => null,
                    'property5' => 234,
                    'property6' => 'sample3',
                    'sample_abstract_property1' => null,
                    'sample_abstract_property2' => null,
                    'sample_abstract_property3' => null,
                    'sample_abstract_property4' => null,
                    'sample_abstract_property5' => null,
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty4(true)
                    ->setProperty5(789)
                    ->setSampleAbstractProperty1(258)
                    ->setSampleAbstractProperty2('another sample')
                    ->setSampleAbstractProperty4(951)
                    ->setSampleAbstractProperty5('yet another sample'),
                'result' => [
                    'property1' => null,
                    'property2' => null,
                    'property3' => null,
                    'property4' => true,
                    'property5' => 789,
                    'property6' => null,
                    'sample_abstract_property1' => 258,
                    'sample_abstract_property2' => 'another sample',
                    'sample_abstract_property3' => null,
                    'sample_abstract_property4' => 951,
                    'sample_abstract_property5' => 'yet another sample',
                ],
            ],
        ];
    }

    protected function getPropertiesFromLeafClass_Data(): array
    {
        return [
            [
                'object' => new PropertyValidatorSampleObject(),
                'result' => [
                    'property1' => null,
                    'property2' => null,
                    'property3' => null,
                    'property4' => null,
                    'property5' => null,
                    'property6' => null,
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty3(['test' => 123]),
                'result' => [
                    'property1' => 123,
                    'property2' => null,
                    'property3' => ['test' => 123],
                    'property4' => null,
                    'property5' => null,
                    'property6' => null,
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty2('sample2')
                    ->setProperty5(234)
                    ->setProperty6('sample3'),
                'result' => [
                    'property1' => null,
                    'property2' => 'sample2',
                    'property3' => null,
                    'property4' => null,
                    'property5' => 234,
                    'property6' => 'sample3',
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty3(['test' => 123])
                    ->setProperty6('sample_2'),
                'filter' => \ReflectionProperty::IS_PRIVATE,
                'result' => [
                    'property1' => 123,
                    'property2' => null,
                    'property3' => ['test' => 123],
                    'property4' => null,
                ],
            ],
            [
                'object' => (new PropertyValidatorSampleObject())
                    ->setProperty1(123)
                    ->setProperty3(['test' => 123])
                    ->setProperty6('sample_2'),
                'filter' => \ReflectionProperty::IS_PUBLIC,
                'result' => [
                    'property6' => 'sample_2',
                ],
            ],
        ];
    }
}
