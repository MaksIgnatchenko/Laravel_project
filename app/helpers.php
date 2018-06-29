<?php
if (!function_exists('iswrong')) {
    function exam($task, $editor)
    {
        $language = 'php';
        $interpreter = '<?php ' . "\n\r";
        $task->check_code;
        $runCode = $interpreter . $editor . $task->check_code;
        $descriptorspec = [
            0 => ["pipe", "r"],  // stdin - канал, из которого дочерний процесс будет читать
            1 => ["pipe", "w"],  // stdout - канал, в который дочерний процесс будет записывать
            2 => ["pipe", "w"] // stderr - файл для записи
        ];
        $process = proc_open($language, $descriptorspec, $pipes, null, null);

        if (is_resource($process)) {
            fwrite($pipes[0], $runCode);
            fclose($pipes[0]);
            $result = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);
            proc_close($process);
        }
        $exam = new stdClass();
        $exam->error = $error;
        $exam->result = $result;
        if (!is_numeric($exam->result)) {
            $exam->error = $exam->result;
            $exam->isPassed = false;
        } else {
            $exam->isPassed = !preg_match('/0+/', $exam->result);
        }
        $exam->code = $runCode;

        return $exam;
    }
}