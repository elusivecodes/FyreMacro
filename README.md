# FyreMacro

**FyreMacro** is a free, open-source macro utility library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Methods](#methods)
- [Calling Macros](#calling-macros)



## Installation

**Using Composer**

```
composer require fyre/macro
```

In PHP:

```php
use Fyre\Utility\Traits\MacroTrait;

class MyClass {
    use MacroTrait;
}
```


## Methods

**Clear Macros**

Clear all macros.

```php
MyClass::clearMacros();
```

**Has Macro**

Determine whether a macro is registered.

```php
$hasMacro = MyClass::hasMacro($name);
```

**Macro**

Register a macro.

- `$name` is a string representing the name of the callback.
- `$callback` is the macro callback.

```php
MyClass::macro($name, $callback);
```


## Calling Macros

**Static Macros**

```php
MyClass::macro('myMethod', function(): bool {
    return true;
});

MyClass::myMethod();
```

**Instance Macros**

```php
MyClass::macro('myMethod', function(): bool {
    return $this->value;
});

$obj = new MyClass();
$obj->value = true;
$obj->myMethod(); // true
```
