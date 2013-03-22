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
        $copyApp = $installedDir . 'app' . DIRECTORY_SEPARATOR;
        
        // copy lib if it exists
        $copyLib = $installedDir . 'lib' . DIRECTORY_SEPARATOR;
        $libDir = $baseDir . 'lib' . DIRECTORY_SEPARATOR;
        
        // cakephp Trois templates dir
        $templateDir = $baseDir . 'plugins' . DIRECTORY_SEPARATOR . 'Trois' . DIRECTORY_SEPARATOR . 'composer' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'cakephp' . DIRECTORY_SEPARATOR;
        
        // schema dir
        $schemaDir = $baseDir . 'plugins' . DIRECTORY_SEPARATOR . 'Trois' . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Schema' . DIRECTORY_SEPARATOR;
        
        // app folders
        $controller = $appDir . 'Controller' . DIRECTORY_SEPARATOR;
        $model = $appDir . 'Model' . DIRECTORY_SEPARATOR;
        $view = $appDir . 'View' . DIRECTORY_SEPARATOR;
        $helper = $view . 'Helper' . DIRECTORY_SEPARATOR;
        $config = $appDir . 'Config' . DIRECTORY_SEPARATOR;
        $webroot = $appDir . 'webroot' . DIRECTORY_SEPARATOR;

        if (is_dir($copyApp)) {
            if ($options['is-windows']) {
                $cp = 'xcopy ';
            } else {
                $cp = 'cp -R ';
            }
            exec( $cp . $copyApp . ' ' . $appDir);
            // three
            exec($cp . $templateDir . 'AppController.inc' . ' ' . $controller . 'AppController.php');
            exec($cp . $templateDir . 'AppModel.inc' . ' ' . $model . 'AppModel.php');
            exec($cp . $templateDir . 'AppHelper.inc' . ' ' . $helper . 'AppHelper.php');
            exec($cp . $templateDir . 'bootstrap.inc' . ' ' . $config . 'bootstrap.php');
            exec($cp . $templateDir . 'index.inc' . ' ' . $webroot . 'index.php');
            exec($cp . $schemaDir . 'schema.php' . ' ' . $config . 'Schema' . DIRECTORY_SEPARATOR . 'schema.php');
            
            // lib cakePHP
            exec( $cp . $copyLib . ' ' . $libDir);
            
            
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