# 🫚 Gember File Reflector: Roave BetterReflection
[![Build Status](https://scrutinizer-ci.com/g/GemberPHP/file-reflector-roave/badges/build.png?b=main)](https://github.com/GemberPHP/file-reflector-roave/actions)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/GemberPHP/file-reflector-roave.svg?style=flat)](https://scrutinizer-ci.com/g/GemberPHP/file-reflector-roave/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/GemberPHP/file-reflector-roave.svg?style=flat)](https://scrutinizer-ci.com/g/GemberPHP/file-reflector-roave)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%5E8.3-8892BF.svg?style=flat)](http://www.php.net)

[Gember Event Sourcing](https://github.com/GemberPHP/event-sourcing) File Reflector adapter based on [roave/better-reflection](https://github.com/roave/better-reflection).

> All external dependencies in Gember Event Sourcing are organized into separate packages,
> making it easy to swap out a vendor adapter for another.

## Installation
Install with Composer:
```bash
composer require gember/file-reflector-roave
```

## Configuration
Bind this adapter to the `Reflector` interface in your service definitions.

### Examples

#### Vanilla PHP
```php
use Gember\FileReflectorRoave\RoaveBetterReflectionFactory;
use Gember\FileReflectorRoave\RoaveBetterReflectionReflector;

$reflector = new RoaveBetterReflectionReflector(
    new RoaveBetterReflectionFactory(), 
);
```

#### Symfony
It is recommended to use the [Symfony bundle](https://github.com/GemberPHP/event-sourcing-symfony-bundle) to configure Gember Event Sourcing.
With this bundle, the adapter is automatically set as the default for File Reflector.

If you're not using the bundle, you can bind it directly to the `Reflector` interface.

```yaml
Gember\FileReflectorRoave\RoaveBetterReflectionFactory: ~

Gember\EventSourcing\Util\File\Reflector\Reflector:
  class: Gember\FileReflectorRoave\RoaveBetterReflectionReflector
  arguments:
    - '@Gember\FileReflectorRoave\RoaveBetterReflectionFactory'
```
