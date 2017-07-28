<?php

namespace PHPBootcamp\Controllers;

//include_once 'ControllerInterface.php';
//include_once 'ContainerInterface.php';

use PHPBootcamp\ContainerInterface;

abstract class AbstractController implements ControllerInterface
{
    /** @var \ContainerInterface */
    protected $container;

    public function __construct(ContainerInterface $dependencyContainer)
    {
        $this->container = $dependencyContainer;
    }

    public function render(string $template, array $content = []) : string
    {
        return include $this->container->get("resourse.views").$template;
    }
}