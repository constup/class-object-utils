# `PropertyReader`

A set of methods which read properties of an object.

## `getPropertiesFromAllParents`

Get names and values of all properties of an object (private, protected
and public) from the original class and all its parents recursively.

*Parameters*

* `$object` - The object you're working on.
* `$filter` - Property type filter. Can be one of the following:
`ReflectionProperty::IS_STATIC`, `ReflectionProperty::IS_PRIVATE`,
`ReflectionProperty::IS_PROTECTED`, `ReflectionProperty::IS_PUBLIC`.

*Returns*

An associative `property_name => property_value` array of all properties
of the object.

*Example*

```php
$result = (new PropertyReader())->getPropertiesFromAllParents($object, $filter);
```

## `getPropertiesFromLeafClass`

Get properties of a leaf class of the object (their names and values).
Properties of parent classes are excluded.

*Parameters*

* `$object` - The object you're working on.
* `$filter` - Property type filter. Can be one of the following:
`ReflectionProperty::IS_STATIC`, `ReflectionProperty::IS_PRIVATE`,
`ReflectionProperty::IS_PROTECTED`, `ReflectionProperty::IS_PUBLIC`.

*Returns*

An associative `property_name => property_value` array of properties of
object's leaf class.

*Example*

```php
$result = (new PropertyReader())->getPropertiesFromLeafClass($object, $filter);
```