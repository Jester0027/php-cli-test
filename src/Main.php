<?php

namespace Cli;

use Cli\Maker\ControllerMaker;

class Main
{
    public static function main(int $argc, array $argv)
    {
        $controllerMaker = new ControllerMaker('App\\Controller');
        switch ($argv[1]) {
            case "make:controller":
                $controllerMaker->createController($argv[2]);
                break;
            case "hello":
                echo 'World';
            default:
        }
    }
}
