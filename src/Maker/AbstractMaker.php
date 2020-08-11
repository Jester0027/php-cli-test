<?php

namespace Cli\Maker;

use Cli\Traits\PathNormalizerTrait;

class AbstractMaker
{
    use PathNormalizerTrait;

    protected $projectPath;
    /**
     * @var string|string
     */
    protected $namespace;

    public function __construct(string $namespace)
    {
        $this->projectPath = $this->wp_normalize_path(getcwd());
        $this->namespace = $namespace;
    }
}
