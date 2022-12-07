<?php

use JiraConnect\Plugin;

use JiraConnect\Core\Registerer;
use JiraConnect\Core\ControllerLoader;

use JiraConnect\Options\Framework;
use JiraConnect\Options\Generator;
use JiraConnect\Options\Uploader;

use JiraConnect\Atlassian\OAuthFactory;

$classes = [
    // Plugin
    Plugin::class => DI\autowire(),

    // Core
    Registerer::class => DI\autowire(),
    ControllerLoader::class => DI\autowire(),

    // Options
    Framework::class => DI\autowire(),
    Generator::class  => DI\autowire(),
    Uploader::class => DI\autowire(),

    // Atlassian
    OAuthFactory::class => DI\autowire(),
];

// Controllers
foreach (Plugin::getControllers() as $controller) {
	$classes[$controller] = DI\autowire();
}

return $classes;