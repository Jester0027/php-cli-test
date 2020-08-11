<?php

namespace Cli;

use Cli\Maker\ControllerMaker;
use Cli\Traits\PathNormalizerTrait;

class Main
{
    use PathNormalizerTrait;

    public static function main(int $argc, array $argv)
    {
        $config = (new Main())->getConfig();
        $appNamespace = $config->applicationNamespace ?? "App";
        $controllerMaker = new ControllerMaker("$appNamespace\\Controller");
        switch ($argv[1]) {
            case "make:controller":
                $controllerMaker->createController($argv[2]);
                break;
            case "Hello":
                echo 'World';
            default:
        }
    }

    public function getConfig(bool $assoc = false)
    {
        $projectDir = $this->wp_normalize_path(getcwd());
        $file = $projectDir . '/cli-config.json';
        if (file_exists($file)) {
            return json_decode(file_get_contents($projectDir . '/cli-config.json'), $assoc);
        }
        return null;
    }
}
