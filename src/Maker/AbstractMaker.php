<?php

namespace Cli\Maker;

use Cli\Traits\PathNormalizerTrait;

class AbstractMaker
{
    use PathNormalizerTrait;

    /**
     * @var string|string[]|null
     */
    protected $projectPath;
    /**
     * @var string
     */
    protected $namespace;

    public function __construct(string $namespace)
    {
        $this->projectPath = $this->wp_normalize_path(getcwd());
        $this->namespace = $namespace;
    }
}
