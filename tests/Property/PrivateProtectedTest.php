<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Tests\Property;

use Constup\ClassObjectUtils\Property\PrivateProtected;
use Constup\ClassObjectUtils\Tests\Property\SampleObjects\PropertyValidatorSampleObject;
use PHPUnit\Framework\TestCase;

/**
 * Class PrivateProtectedTest
 *
 * @package Constup\ClassObjectUtils\Tests\Property
 */
class PrivateProtectedTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testInvokeMethod()
    {
        $private_protected = new PrivateProtected();
        $object = new PropertyValidatorSampleObject();

        $expected = $object->getProperty4();
        $result = $private_protected->invokeMethod($object, 'getProperty4');
        $this->assertSame($expected, $result);

        $object->setProperty4(true);
        $expected = $object->getProperty4();
        $result = $private_protected->invokeMethod($object, 'getProperty4');
        $this->assertSame($expected, $result);

        $this->assertNull($object->getProperty1());
        $private_protected->invokeMethod($object, 'setProperty1', [123]);
        $result = $object->getProperty1();
        $this->assertSame(123, $result);
    }

    public function testPropertyReader()
    {
        $private_protected = new PrivateProtected();
        $object = new PropertyValidatorSampleObject();
        $reader = $private_protected->propertyReader();

        $result = &$reader($object, 'property4');
        $this->assertNull($result);

        $object->setProperty4(true);
        $result = &$reader($object, 'property4');
        $this->assertSame(true, $result);

        $object->setProperty4(false);
        $result = &$reader($object, 'property4');
        $this->assertSame(false, $result);
    }
}
