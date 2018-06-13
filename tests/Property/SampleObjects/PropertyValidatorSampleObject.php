<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Tests\Property\SampleObjects;

/**
 * Class PropertyValidatorSampleObject
 *
 * A sample data object used for unit testing PropertyValidatorTrait.
 *
 * @package Constup\ClassObjectUtils\Tests\Property\SampleObjects
 */
class PropertyValidatorSampleObject extends AbstractPropertyValidatorSampleObject
{
    /** @var string|null */
    public $property6;
    /** @var int|null */
    protected $property5;
    /** @var int|null */
    private $property1;
    /** @var string|null */
    private $property2;
    /** @var array|null */
    private $property3;
    /** @var bool|null */
    private $property4;

    /**
     * @return int|null
     */
    public function getProperty1(): ?int
    {
        return $this->property1;
    }

    /**
     * @param int|null $property1
     *
     * @return PropertyValidatorSampleObject
     */
    public function setProperty1(?int $property1): self
    {
        $this->property1 = $property1;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getProperty2(): ?string
    {
        return $this->property2;
    }

    /**
     * @param null|string $property2
     *
     * @return PropertyValidatorSampleObject
     */
    public function setProperty2(?string $property2): self
    {
        $this->property2 = $property2;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getProperty3(): ?array
    {
        return $this->property3;
    }

    /**
     * @param array|null $property3
     *
     * @return PropertyValidatorSampleObject
     */
    public function setProperty3(?array $property3): self
    {
        $this->property3 = $property3;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getProperty4(): ?bool
    {
        return $this->property4;
    }

    /**
     * @param bool|null $property4
     *
     * @return PropertyValidatorSampleObject
     */
    public function setProperty4(?bool $property4): self
    {
        $this->property4 = $property4;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProperty5(): ?int
    {
        return $this->property5;
    }

    /**
     * @param int|null $property5
     *
     * @return PropertyValidatorSampleObject
     */
    public function setProperty5(?int $property5): self
    {
        $this->property5 = $property5;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getProperty6(): ?string
    {
        return $this->property6;
    }

    /**
     * @param null|string $property6
     *
     * @return PropertyValidatorSampleObject
     */
    public function setProperty6(?string $property6): self
    {
        $this->property6 = $property6;

        return $this;
    }
}
