<?php

namespace App\Executors;


class PhpExecutor extends Executor
{
    const LANGUAGE = 'php';
    const INTERPRETER = '<?php ' . "\n\r";
}