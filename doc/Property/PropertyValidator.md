# `PropertyValidator`

Property validation methods.

## `validateAllPropertiesArePopulated`

Validate that all properties are populated (have values assigned to
them). Useful when you're using setter dependency injection or just want
to check if all properties are populated before you use an oobject.

*Parameters*

* `$object` - The object you're working on.
* `$filter` - Property type filter. Can be one of the following:
`ReflectionProperty::IS_STATIC`, `ReflectionProperty::IS_PRIVATE`,
`ReflectionProperty::IS_PROTECTED`, `ReflectionProperty::IS_PUBLIC`.
* `$can_be_null` - You can pass a list of property names that you want
to exclde from the check. If any of the excluded properties ar null,
this validator will not throw an exception.
* `$include_parents` - If set to `true` the validator will also look if
all properties from all parents classes are populated. `false` will
only check properties of a lef class of the object.

*Returns*

Returns nothing, but will throw an `\Exception` if the validation fails.
The validation will fail if any of the properties (except the ones in
`can_be_null`) is null.

*Example*

```php
$object = new SampleObject();
$property_validator = new PropertyValidator();
// Validate all properties of an entire object, including all properties from all parents.
$result = $property_validator->validateAllPropertiesArePopulated($object);
// Validate private properties of an entire object, including properties from all parents.
$result = $property_validator
    ->validateAllPropertiesArePopulated($object, \ReflectionProperty::IS_PRIVATE);
// Validate all properties except some_null_property.
$result = $property_validator
    ->validateAllPropertiesArePopulated($object, null, ['some_null_property']);
// Only validate properties from the leaf class of an objects (ignore properties from parents).
$result = $property_validator
    ->validateAllPropertiesArePopulated($object, null, [], false);
```

## `validatePropertiesArePopulated`

Validate that a specific set of properties are populated (have values
assigned to them). This potentially includes properties from parents.

*Parameters*

* `$object` - The object you're working on.
* `$properties` - An array containing names of the properties which you
want to validate.

*Returns*

Returns nothing, but will throw an `\Exception` if the validation fails.
The validation will fail if any of the listed properties is null.

*Example*

```php
$object = new SampleObject();
$result = (new PropertyValidator())
    ->validatePropertiesArePopulated($object, ['some_property', 'another_property']);
```