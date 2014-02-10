<?php
namespace Praemitto\Composer\Scripts\Laravel;

use Composer\Script\Event;

class Bootstrap
{
    private static function copyFiles()
    {
        $cwd = getcwd();

        if( !is_dir( $cwd . '/public/css' ) )
        {
            mkdir( $cwd . '/public/css' );
        }

        if( !is_dir( $cwd . '/public/fonts' ) )
        {
            mkdir( $cwd . '/public/fonts' );
        }

        if( !is_dir( $cwd . '/public/js' ) )
        {
            mkdir( $cwd . '/public/js' );
        }

        copy( $cwd . '/vendor/twbs/bootstrap/dist/css/bootstrap.min.css', $cwd . '/public/css/bootstrap.min.css' );
        copy( $cwd . '/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css', $cwd . '/public/css/bootstrap-theme.min.css' );

        copy( $cwd . '/vendor/twbs/bootstrap/dist/fonts/glyphicons-halflings-regular.eot', $cwd . '/public/fonts/glyphicons-halflings-regular.eot' );
        copy( $cwd . '/vendor/twbs/bootstrap/dist/fonts/glyphicons-halflings-regular.svg', $cwd . '/public/fonts/glyphicons-halflings-regular.svg' );
        copy( $cwd . '/vendor/twbs/bootstrap/dist/fonts/glyphicons-halflings-regular.ttf', $cwd . '/public/fonts/glyphicons-halflings-regular.ttf' );
        copy( $cwd . '/vendor/twbs/bootstrap/dist/fonts/glyphicons-halflings-regular.woff', $cwd . '/public/fonts/glyphicons-halflings-regular.woff' );

        copy( $cwd . '/vendor/twbs/bootstrap/dist/js/bootstrap.min.js', $cwd . '/public/js/bootstrap.min.js' );
    }

    public static function postPackageInstall( Event $event )
    {
        $packageName = $event->getOperation()->getPackage()->getName();

        if( $packageName == 'twbs/bootstrap' )
        {
            self::copyFiles();
        }
    }

    public static function postPackageUpdate( Event $event )
    {
        $packageName = $event->getOperation()->getInitialPackage()->getName();

        if( $packageName == 'twbs/bootstrap' )
        {
            self::copyFiles();
        }
    }
}
?>
