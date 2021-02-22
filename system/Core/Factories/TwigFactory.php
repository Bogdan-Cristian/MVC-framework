<?php

namespace System\Core\Factories;

class TwigFactory
{

    public function getLoader($path)
    {
        return new \Twig\Loader\FilesystemLoader($path);
    }

    
    public function getEnvironment(\Twig\Loader\FilesystemLoader $twig_fsl)
    {
        return new \Twig\Environment($twig_fsl, [
            'cache' => false
        ]);
    }
}