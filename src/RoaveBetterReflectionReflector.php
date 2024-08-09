<?php

declare(strict_types=1);

namespace Gember\FileReflectorRoave;

use Gember\EventSourcing\Util\File\Reflector\ReflectionFailedException;
use Gember\EventSourcing\Util\File\Reflector\Reflector;
use ReflectionClass;

final readonly class RoaveBetterReflectionReflector implements Reflector
{
    public function __construct(
        private RoaveBetterReflectionFactory $factory,
    ) {}

    public function reflectClassFromFile(string $file): ReflectionClass
    {
        $reflector = $this->factory->createRoaveReflectorForFile($file);

        foreach ($reflector->reflectAllClasses() as $reflectClass) {
            return new ReflectionClass($reflectClass->getName());
        }

        throw ReflectionFailedException::classNotFound($file);
    }
}
