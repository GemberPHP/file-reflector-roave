<?php

declare(strict_types=1);

namespace Gember\FileReflectorRoave;

use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\DefaultReflector;
use Roave\BetterReflection\Reflector\Reflector;
use Roave\BetterReflection\SourceLocator\Type\SingleFileSourceLocator;

final readonly class RoaveBetterReflectionFactory
{
    /**
     * @param non-empty-string $file
     */
    public function createRoaveReflectorForFile(string $file): Reflector
    {
        return new DefaultReflector(
            new SingleFileSourceLocator(
                $file,
                (new BetterReflection())->astLocator(),
            ),
        );
    }
}
