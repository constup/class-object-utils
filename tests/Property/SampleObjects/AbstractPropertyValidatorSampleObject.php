<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\Tests\Property\SampleObjects;

/**
 * Class AbstractPropertyValidatorSampleObject
 *
 * @package Constup\ClassObjectUtils\Tests\Property\SampleObjects
 */
abstract class AbstractPropertyValidatorSampleObject
{
    /** @var string */
    public $sample_abstract_property5;
    /** @var int */
    protected $sample_abstract_property4;
    /** @var int */
    private $sample_abstract_property1;
    /** @var string */
    private $sample_abstract_property2;
    /** @var array */
    private $sample_abstract_property3;

    /**
     * @return int
     */
    public function getSampleAbstractProperty1(): int
    {
        return $this->sample_abstract_property1;
    }

    /**
     * @param int $sample_abstract_property1
     *
     * @return AbstractPropertyValidatorSampleObject
     */
    public function setSampleAbstractProperty1(int $sample_abstract_property1): self
    {
        $this->sample_abstract_property1 = $sample_abstract_property1;

        return $this;
    }

    /**
     * @return string
     */
    public function getSampleAbstractProperty2(): string
    {
        return $this->sample_abstract_property2;
    }

    /**
     * @param string $sample_abstract_property2
     *
     * @return AbstractPropertyValidatorSampleObject
     */
    public function setSampleAbstractProperty2(string $sample_abstract_property2): self
    {
        $this->sample_abstract_property2 = $sample_abstract_property2;

        return $this;
    }

    /**
     * @return array
     */
    public function getSampleAbstractProperty3(): array
    {
        return $this->sample_abstract_property3;
    }

    /**
     * @param array $sample_abstract_property3
     *
     * @return AbstractPropertyValidatorSampleObject
     */
    public function setSampleAbstractProperty3(array $sample_abstract_property3): self
    {
        $this->sample_abstract_property3 = $sample_abstract_property3;

        return $this;
    }

    /**
     * @return int
     */
    public function getSampleAbstractProperty4(): int
    {
        return $this->sample_abstract_property4;
    }

    /**
     * @param int $sample_abstract_property4
     *
     * @return AbstractPropertyValidatorSampleObject
     */
    public function setSampleAbstractProperty4(int $sample_abstract_property4): self
    {
        $this->sample_abstract_property4 = $sample_abstract_property4;

        return $this;
    }

    /**
     * @return string
     */
    public function getSampleAbstractProperty5(): string
    {
        return $this->sample_abstract_property5;
    }

    /**
     * @param string $sample_abstract_property5
     *
     * @return AbstractPropertyValidatorSampleObject
     */
    public function setSampleAbstractProperty5(string $sample_abstract_property5): self
    {
        $this->sample_abstract_property5 = $sample_abstract_property5;

        return $this;
    }
}
