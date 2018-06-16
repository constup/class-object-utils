# Class Object Utils


[![Build Status](https://travis-ci.org/constup/class-object-utils.svg?branch=master)](https://travis-ci.org/constup/class-object-utils)
[![Packagist](https://img.shields.io/packagist/v/constup/class-object-utils.svg)](https://packagist.org/packages/constup/class-object-utils)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/constup/class-object-utils.svg)](https://packagist.org/packages/constup/class-object-utils)
[![Coverage Status](https://coveralls.io/repos/github/constup/class-object-utils/badge.svg?branch=master)](https://coveralls.io/github/constup/class-object-utils?branch=master)
[![Codecov](https://img.shields.io/codecov/c/github/constup/class-object-utils.svg)](https://codecov.io/gh/constup/class-object-utils)
[![license](https://img.shields.io/github/license/constup/class-object-utils.svg)](https://github.com/constup/class-object-utils/blob/master/LICENSE)


## Setup

### Description

A set of PHP class and object utilities

### Prerequisites

* PHP 7.1

### Installation

The preferred method of installation is through composer:

```bash
composer require constup/class-object-utils
```

### Running tests

#### PHP Unit

[`phpnit.xml.dist`](phpunit.xml.dist) configuration file is in the root directory of the
package. You can run PHPUnit tests with coverage with:

```bash
phpunit --configuration [PACKAGE_DIRECTORY]/phpunit.xml.dist [PACKAGE_DIRECTORY]/tests/
```

Don't forget to replace `[PACKAGE_DIRECTORY]` with the actual path of
where the package is installed.

Coverage results are available in clover and HTML formats (see
[`phpunit.xml.dist`](phpunit.xml.dist) for more details.

### License

MIT License (See [`LICENSE`](LICENSE) for more details).

---

## Use

* [PHPUnit](doc/PHPUnit)
    * [AbstractTestCase](doc/PHPUnit/AbstractTestCase.md)
* [Property](doc/Property)
    * [PrivateProtected](doc/Property/PrivateProtected.md)
    * [PropertyReader](doc/Property/PropertyReader.md)
    * [PropertyValidator](doc/Property/PropertyValidator.md)

