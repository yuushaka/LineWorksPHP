<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit365052d9801a66013e61bb4e6bf13a4b
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LineWorks\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LineWorks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'LineWorks\\Service\\TalkBot' => __DIR__ . '/../..' . '/src/LineWorks/Service/TalkBot.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit365052d9801a66013e61bb4e6bf13a4b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit365052d9801a66013e61bb4e6bf13a4b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit365052d9801a66013e61bb4e6bf13a4b::$classMap;

        }, null, ClassLoader::class);
    }
}
