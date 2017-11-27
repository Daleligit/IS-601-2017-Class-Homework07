<?php
    use classes;
    //Bug report massage
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    //autoload all classes
    class classMap {
        static public function setDir ($input) {
            return str_replace('\\','/', $input) . '.php';
        }
    }
    class Manage {
        static public function autoload($class) {
            include classMap::setdir($class);
        }
    }
    //register all loaded classes
    spl_autoload_register(array('Manage', 'autoload'));
    define('DATABASE', 'yl622');
    define('USERNAME', 'yl622');
    define('PASSWORD', 'evPkHDGVf');
    define('CONNECTION', 'sql2.njit.edu');
    $connErr = '';
    $sqlErr = '';
    $obj = new classes\main();
?>