<?php
declare(strict_types=1);

namespace Tests\Mock;

use BadMethodCallException;
use PHPUnit\Framework\TestCase;

class MacroTest extends TestCase
{
    public function testHasMacro(): void
    {
        MyClass::macro('testMacro', function() {
            return 'Hello, World!';
        });

        $this->assertTrue(MyClass::hasMacro('testMacro'));
    }

    public function testHasMacroFalse(): void
    {
        $this->assertFalse(MyClass::hasMacro('testMacro'));
    }

    public function testMacroCall(): void
    {
        MyClass::macro('testMacro', function(): string {
            return $this->value;
        });

        $obj = new MyClass();
        $obj->value = 'This is a string';
        $this->assertSame('This is a string', $obj->testMacro());
    }

    public function testMacroCallInvalid(): void
    {
        $this->expectException(BadMethodCallException::class);

        $obj = new MyClass();
        $obj->testMacro();
    }

    public function testMacroStaticCall(): void
    {
        MyClass::macro('testMacro', function(): string {
            return 'This is a string';
        });

        $this->assertSame('This is a string', MyClass::testMacro());
    }

    public function testMacroStaticCallInvalid(): void
    {
        $this->expectException(BadMethodCallException::class);

        MyClass::testMacro();
    }

    public function setUp(): void
    {
        MyClass::clearMacros();
    }
}
