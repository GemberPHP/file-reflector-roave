<?php

declare(strict_types=1);

namespace Gember\FileReflectorRoave\Test;

use Gember\EventSourcing\Util\File\Reflector\ReflectionFailedException;
use Gember\FileReflectorRoave\RoaveBetterReflectionFactory;
use Gember\FileReflectorRoave\RoaveBetterReflectionReflector;
use Gember\FileReflectorRoave\Test\TestDoubles\TestClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class RoaveBetterReflectionReflectorTest extends TestCase
{
    private RoaveBetterReflectionReflector $reflector;

    protected function setUp(): void
    {
        parent::setUp();

        $this->reflector = new RoaveBetterReflectionReflector(
            new RoaveBetterReflectionFactory(),
        );
    }

    #[Test]
    public function itShouldReflectFileName(): void
    {
        $reflectionClass = $this->reflector->reflectClassFromFile(__DIR__ . '/TestDoubles/TestClass.php');

        self::assertSame(TestClass::class, $reflectionClass->getName());
    }

    #[Test]
    public function itShouldThrowExceptionWhenClassNotFound(): void
    {
        self::expectException(ReflectionFailedException::class);

        $this->reflector->reflectClassFromFile(__DIR__ . '/TestDoubles/no-class.php');
    }
}
