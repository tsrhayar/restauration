<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5f0222d7971edc0c31f9fb464f78417
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5f0222d7971edc0c31f9fb464f78417::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5f0222d7971edc0c31f9fb464f78417::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}