<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbafa43d18bcafd80875991b8abea488a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbafa43d18bcafd80875991b8abea488a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbafa43d18bcafd80875991b8abea488a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}