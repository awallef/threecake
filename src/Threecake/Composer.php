<?php

namespace Threecake;

class Composer {

    /**
     * Called after CakePHP was installed
     */
    public static function afterInstall($event) {
        $options = self::getOptions($event);

        // root of our app
        $baseDir = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR;

        // where our app is going to be
        $appDir = $baseDir . $options['cakephp-app-dir'] . DIRECTORY_SEPARATOR;

        // where cakephp was installed with composer
        $installedDir = $baseDir . $options['vendor-dir'] . DIRECTORY_SEPARATOR . 'cakephp' . DIRECTORY_SEPARATOR . 'cakephp' . DIRECTORY_SEPARATOR;

        // copy app if it exists
        $copyApp = $installedDir . $options['cakephp-app-dir'] . DIRECTORY_SEPARATOR;
        
        // copy lib if it exists
        $copyLib = $installedDir . 'lib' . DIRECTORY_SEPARATOR;
        $libDir = $baseDir . 'lib' . DIRECTORY_SEPARATOR;
        
        // copy plugin
        $copyPlugins = $installedDir . 'plugins' . DIRECTORY_SEPARATOR;
        $pluginsDir = $baseDir . 'plugins' . DIRECTORY_SEPARATOR;

        if (is_dir($copyApp)) {
            if ($options['is-windows']) {
                $cp = 'xcopy ';
            } else {
                $cp = 'cp -R ';
            }
            exec( $cp . $copyApp . ' ' . $appDir);
            
            // lib cakePHP
            exec( $cp . $copyLib . ' ' . $libDir);
            
            // lib cakePHP
            exec( $cp . $copyLib . ' ' . $libDir);
            
            // plugins cakePHP
            exec( $cp . $copyPlugins . ' ' . $pluginsDir);
            
            
        }
    }

    /**
     * Copy Change and write! boom
     */
    protected static function ccw($find, $replace, $inputFile, $outputFile) {
        
        $fi = fopen($inputFile, 'r');
        $source = '';
        while (!feof($fi)) {
           $source .= fgets($fi);
        }
        fclose($fi);
        $source = str_replace($find, $replace, $source);
        file_put_contents($outputFile,$source);
    }
    
    /**
     * Get options
     */
    protected static function getOptions($event) {
        $options = array_merge(array(
            'vendor-dir' => 'vendor',
            'cakephp-app-dir' => 'app',
            'is-windows' => (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? true : false,
                ), $event->getComposer()->getPackage()->getExtra());
        return $options;
    }

}