<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ffb1bc16664a428c88f35b307e23001
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Michelf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Michelf\\' => 
        array (
            0 => __DIR__ . '/..' . '/michelf/php-markdown/Michelf',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ffb1bc16664a428c88f35b307e23001::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ffb1bc16664a428c88f35b307e23001::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
