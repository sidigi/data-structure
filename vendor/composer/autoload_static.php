<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2dde91128fcd103e6b14f0bbdb8df32
{
    public static $files = array (
        'e9cb6c89cfb8eb7a0a11f5d7d26fe059' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2dde91128fcd103e6b14f0bbdb8df32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2dde91128fcd103e6b14f0bbdb8df32::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
