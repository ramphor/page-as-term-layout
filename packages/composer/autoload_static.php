<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d6d5290d3f9cd04b6d1c9d180ca2878
{
    public static $files = array (
        '410b106fcb8e286c3c2040e5508865dd' => __DIR__ . '/../..' . '/page-as-term-layout.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Ramphor\\TermLayout\\' => 19,
        ),
        'J' => 
        array (
            'Jankx\\Abstractions\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ramphor\\TermLayout\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Jankx\\Abstractions\\' => 
        array (
            0 => __DIR__ . '/..' . '/jankx/abstractions/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d6d5290d3f9cd04b6d1c9d180ca2878::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d6d5290d3f9cd04b6d1c9d180ca2878::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4d6d5290d3f9cd04b6d1c9d180ca2878::$classMap;

        }, null, ClassLoader::class);
    }
}
