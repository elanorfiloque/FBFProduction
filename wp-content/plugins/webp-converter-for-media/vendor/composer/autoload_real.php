<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf93474aac0e4c44ceebb45c027d023b5
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf93474aac0e4c44ceebb45c027d023b5', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf93474aac0e4c44ceebb45c027d023b5', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf93474aac0e4c44ceebb45c027d023b5::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}