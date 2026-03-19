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
    }
?>