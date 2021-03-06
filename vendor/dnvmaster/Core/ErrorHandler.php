<?php


namespace dnvmaster;


class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG)
        {
            error_reporting(-1);
        }
        else
        {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    public function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') ."] Текст ошибки: {$message} | Файл: {$file} | Cтрока: {$line}\n---------------\n", 3, ROOT . '/temp/errors.log');
    }

    public function displayError($errno, $errstr, $errfile, $errline, $responce = 404)
    {
        http_response_code($responce);
        if ($responce == 404 && !DEBUG)
        {
            require WWW . '/errors/404.php';
            die();
        }
        if (DEBUG)
        {
            require WWW . '/errors/development.php';
        }
        else
        {
            require  WWW . '/errors/production.php';
        }
    }
}