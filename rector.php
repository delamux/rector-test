<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src'
    ]);

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
    ]);
    $rectorConfig->phpVersion(PhpVersion::PHP_74);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    $services = $rectorConfig->services();
    $services->set(TypedPropertyRector::class);

    // define s/*ets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_74
    ]);
};
