<?php

declare(strict_types = 1);

namespace Constup\ClassObjectUtils\PHPUnit;

use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTestCase
 *
 * @package Constup\ClassObjectUtils\PHPUnit
 * @codeCoverageIgnore
 */
abstract class AbstractTestCase extends TestCase
{
    /**
     * @param string $exception_name
     * @param $code
     *
     * @throws Exception
     */
    protected function assertThrowsException(string $exception_name, $code): void
    {
        $e = null;

        try {
            $code();
        } catch (Exception $e) {
        }

        if (empty($e)) {
            throw new Exception('No exception thrown.');
        }

        if (!$e instanceof $exception_name) {
            throw new Exception('Wrong exception type thrown.');
        }

        $this->addToAssertionCount(1);
    }

    /**
     * @param string $message
     * @param $code
     *
     * @throws Exception
     */
    protected function assertThrowsExceptionMessage(string $message, $code): void
    {
        $e = null;

        try {
            $code();
        } catch (Exception $e) {
        }

        if (strpos($e->getMessage(), $message) !== false) {
            $this->addToAssertionCount(1);
        } else {
            throw new Exception('Wrong exception message.');
        }
    }
}
