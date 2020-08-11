<?php

namespace Cli\Maker;

class ControllerMaker extends AbstractMaker
{
    public function createController(string $controllerName): void
    {
        $namespace = $this->namespace;
        $path = 'src/Controller/';
        $file = file_get_contents(__ROOT__ . '/templates/Controller');
        if (strpos($controllerName, '/')) {
            $controllerNamespace = explode('/', $controllerName);
            $controllerName = end($controllerNamespace);
            array_pop($controllerNamespace);
            foreach ($controllerNamespace as $dir) {
                $namespace .= "\\$dir";
            }
            $path = $path . implode('/', $controllerNamespace);
        }

        $file = str_replace('%NAMESPACE%', $namespace, $file);
        $file = str_replace('%CLASSNAME%', $controllerName, $file);
        $absolutePath = $this->projectPath . "/$path";
        if (!file_exists($absolutePath)) {
            mkdir($absolutePath, 0755, true);
        }
        $f = fopen($this->projectPath . "/{$path}/{$controllerName}Controller.php", 'w');
        fwrite($f, $file);
        fclose($f);
    }
}
