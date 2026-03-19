<?php

    class MyAutoload
    {
        public static function start()
        {
            spl_autoload_register(array(__CLASS__, 'autoload'));

            $root = $_SERVER['DOCUMENT_ROOT'];
            $host = $_SERVER['HTTP_HOST'];

            define('ROOT', $root.'/');
            define('HOST', 'http://'.$host.'/');

            define('ASSET', HOST . 'asset/');

            define('CONTROLLER', ROOT . 'controller/');
            define('VIEW', ROOT . 'view/');
            define('CLASSES', ROOT . 'classes/');
            define('MODEL', ROOT . 'model/');
            define('FONCTION', ROOT . 'fonctions/');
            define('VENDOR', ROOT . 'vendor/');

        }

        public static function autoload($class)
        {
            if(file_exists(MODEL.$class.'.php')) {
                include_once MODEL.$class.'.php';
            } elseif(file_exists(CONTROLLER.$class.'.php')) {
                include_once CONTROLLER.$class.'.php';
            } elseif(file_exists(CLASSES.$class.'.php')) {
                include_once CLASSES.$class.'.php';
            } elseif(file_exists(VIEW.$class.'.php')) {
                include_once VIEW.$class.'.php';
            } else {
                throw new Exception("Class $class not found.");
            }
        }
    }
?>