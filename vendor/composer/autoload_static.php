<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6839754be34d91bacdf9cc2ed4218457
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/modele',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit6839754be34d91bacdf9cc2ed4218457::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
