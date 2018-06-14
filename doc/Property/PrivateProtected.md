# `PrivateProtected`

A set of methods to deal with private and protected properties of an
object.

## `invokeMethod`

Invoke private or protected method with parameters. Useful for PHPUnit
tests, dangerous for pretty much anything else.

*Parameters*

* `$object` - The object you're working on.
* `$method_name` - Name of the method to invoke.
* `$parameters` - An array of parameter values to use when calling the
method.

*Returns*

Invokes the method.

*Example*

```php
$object = new SomeObject();
$result = (new PrivateProtected())
    ->invokeMethod($object, 'some_method', ['parameter 1 value', 'parameter 2 value']);
```

## `propertyReader`

Read a private or protected property value without reflection. Useful in
PHPUnit tests, dangerous pretty much anywhere else.

*Parameters*

None.

*Returns*

Closure.

*Example*

```php
$object = new SomeObject();
$reader = (new PrivateProtected())->propertyReader();
$result = &$reader($object, 'some_property');
```