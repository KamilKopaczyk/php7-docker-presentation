<?php

function myErrorHandler($errno, $errstr, $errfile, $errline)
{

    switch ($errno) {
        case E_USER_ERROR:
            echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ', PHP ' . PHP_VERSION . ' (' . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            exit(1);
            break;

        case E_USER_WARNING:
            echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
            break;

        case E_USER_NOTICE:
            echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
            break;

        default:
            echo "Unknown error type: [$errno] $errstr<br />\n";
            break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

set_error_handler('myErrorHandler');

class Calculator {
    public function add(int $left, int $right): int {
        return $left + $right;
    }
}


$calc = new Calculator();
$result = $calc->add(1, 3);

$calc->add('not an int', 'whoops');