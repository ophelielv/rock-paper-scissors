<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10f3fafcc8fe70401db494d26c5c3232
{
    public static $files = array (
        'e88992873b7765f9b5710cab95ba5dd7' => __DIR__ . '/..' . '/hoa/consistency/Prelude.php',
        '3e76f7f02b41af8cea96018933f6b7e3' => __DIR__ . '/..' . '/hoa/protocol/Wrapper.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '4b7476a768c48566b152323c69f12e6d' => __DIR__ . '/..' . '/hoa/websocket/Socket.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Routing\\' => 26,
            'Symfony\\Component\\HttpFoundation\\' => 33,
            'Symfony\\Component\\EventDispatcher\\' => 34,
        ),
        'R' => 
        array (
            'React\\Stream\\' => 13,
            'React\\Socket\\' => 13,
            'React\\EventLoop\\' => 16,
            'Ratchet\\' => 8,
        ),
        'H' => 
        array (
            'Hoa\\Websocket\\' => 14,
            'Hoa\\Stream\\' => 11,
            'Hoa\\Socket\\' => 11,
            'Hoa\\Protocol\\' => 13,
            'Hoa\\Http\\' => 9,
            'Hoa\\Exception\\' => 14,
            'Hoa\\Event\\' => 10,
            'Hoa\\Consistency\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Routing\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/routing',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'React\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/stream/src',
        ),
        'React\\Socket\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/socket/src',
        ),
        'React\\EventLoop\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/event-loop/src',
        ),
        'Ratchet\\' => 
        array (
            0 => __DIR__ . '/..' . '/cboden/ratchet/src/Ratchet',
        ),
        'Hoa\\Websocket\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/websocket',
        ),
        'Hoa\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/stream',
        ),
        'Hoa\\Socket\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/socket',
        ),
        'Hoa\\Protocol\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/protocol',
        ),
        'Hoa\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/http',
        ),
        'Hoa\\Exception\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/exception',
        ),
        'Hoa\\Event\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/event',
        ),
        'Hoa\\Consistency\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/consistency',
        ),
    );

    public static $prefixesPsr0 = array (
        'G' => 
        array (
            'Guzzle\\Stream' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/stream',
            ),
            'Guzzle\\Parser' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/parser',
            ),
            'Guzzle\\Http' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/http',
            ),
            'Guzzle\\Common' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/common',
            ),
        ),
        'E' => 
        array (
            'Evenement' => 
            array (
                0 => __DIR__ . '/..' . '/evenement/evenement/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10f3fafcc8fe70401db494d26c5c3232::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10f3fafcc8fe70401db494d26c5c3232::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit10f3fafcc8fe70401db494d26c5c3232::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}