<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef85a1b2832f37a13c02b13c51326a3a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef85a1b2832f37a13c02b13c51326a3a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef85a1b2832f37a13c02b13c51326a3a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}