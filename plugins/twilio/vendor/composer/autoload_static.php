<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit606fe4897e297b1ae740a663e0454b47
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit606fe4897e297b1ae740a663e0454b47::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit606fe4897e297b1ae740a663e0454b47::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit606fe4897e297b1ae740a663e0454b47::$classMap;

        }, null, ClassLoader::class);
    }
}