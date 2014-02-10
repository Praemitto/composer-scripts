<?php
namespace Praemitto\Composer\Scripts\Laravel;

use Composer\Script\Event;

class jQuery
{
    private static function copyFiles()
    {
        $cwd = getcwd();

        if( !is_dir( $cwd . '/public/js' ) )
        {
            mkdir( $cwd . '/public/js' );
        }

        copy( $cwd . '/vendor/jquery/jquery/jquery-1.11.0.min.js', $cwd . '/public/js/jquery.min.js' );
    }

    public static function postPackageInstall( Event $event )
    {
        $packageName = $event->getOperation()->getPackage()->getName();

        if( $packageName == 'jquery/jquery' )
        {
            self::copyFiles();
        }
    }

    public static function postPackageUpdate( Event $event )
    {
        $packageName = $event->getOperation()->getInitialPackage()->getName();

        if( $packageName == 'jquery/jquery' )
        {
            self::copyFiles();
        }
    }
}
?>
