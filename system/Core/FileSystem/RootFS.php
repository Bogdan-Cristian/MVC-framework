<?php

namespace System\Core\FileSystem;

class RootFS
{
    private static $root;

    public function setRoot($rootPath)
    {
        self::$root = $rootPath;
    }

    
    public function getRoot()
    {
        return self::$root;
    }
}