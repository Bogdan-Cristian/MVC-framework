<?php

namespace System\Core\ViewModule;

use System\Core\FileSystem\RootFS;
use System\Core\Factories\TwigFactory;

class TwigModule
{
    protected $loader;

    protected $twig;

    public function __construct(TwigFactory $twig_factory, RootFS $root)
    {
        
        $this->loader = $twig_factory->getLoader($root->getRoot() . "src" . DIRECTORY_SEPARATOR . "Views");
        $this->twig = $twig_factory->getEnvironment($this->loader, [
            'cache' => false
        ]);
    }

    public function render($file, $params = [])
    {
        echo $this->twig->render($file, $params);
    }

} 