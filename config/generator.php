<?php declare(strict_types=1);

use SkjalatilkynningApiClient\Generator\Transformer;
use Stefna\PhpCodeBuilder\Renderer\Php82Renderer;

return [
    'transformer' => new Transformer(),
    'specification' => dirname(__DIR__) . '/resources/skjalatilkynning-api.json',
    'saveLocation' => dirname(__DIR__) . '/generated',
    'requestBodyRequiredByDefault' => true,
    'phpRenderer' => new Php82Renderer(),
];

