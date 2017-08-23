<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4409081dadd3ccb55c4c0490aa079a1b
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

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4409081dadd3ccb55c4c0490aa079a1b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4409081dadd3ccb55c4c0490aa079a1b::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4409081dadd3ccb55c4c0490aa079a1b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
