<?php
class AutoLoad
{
    public function __construct()
    {
        spl_autoload_register(array($this, '_autoload'));
    }

    private function _autoload($file)
    {
        $file = LIBRARIES_PATH . "class/class." . str_replace("\\", "/", trim($file, '\\')) . '.php';
        if (file_exists($file)) require_once $file;

        // Menu

        if (file_exists(LIBRARIES . "Menu.php")) {

            require_once LIBRARIES . "Menu.php";
        }
    }
}
