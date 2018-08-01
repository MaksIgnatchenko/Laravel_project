<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //task 1
        $task = new Task();
        $task->language = 'php';
        $task->theme = 'common';
        $task->task_desc = 'Функция получает на вход массив чисел, должна вернуть сумму этих чисел. Не использовать встроенные функции суммирования php. @param array $arr return integer';
        $task->short_desc = 'Сумма';
        $task->task_view = <<<'TASKVIEW'
function my_sum($arr) {
    // Your code here
}
TASKVIEW;
        $task->check_code = <<<'TEXT'
function test($received, $expected) {
    echo $expected === $received ? 1
        : 0;
}
function test_my_sum(){    
    test(12, my_sum(array(10, 2, 0)));
    test(144, my_sum(array(10, 20, 100, 14)));
    test(12, my_sum(array(-50, 200, -100, -50, 12)));
}
test_my_sum();
TEXT;
        $task->difficulty = 1;
        $task->user_id = 1;
        $task->is_published = 1;
        $task->save();

        //task 2

        $task = new Task();
        $task->language = 'php';
        $task->theme = 'string';
        $task->task_desc = <<<'DESC'
Функция получает на вход длинную строку с множеством слов.
Она должна вернуть ту же строку, но в словах, которые длиннее 6 символов,
функция должна вместо всех символов после шестого поставить одну звездочку.
Пример: Из слова 'verwijdering' должно получиться 'verwij*'
@param string $shortMe
@return string
DESC;
        $task->short_desc = 'Строки';
        $task->task_view = <<<'TASKVIEW'
function shortener($shortMe) {
    // Your code here
}
TASKVIEW;
        $task->check_code = <<<'TEXT'
function test($received, $expected) {
    echo $expected === $received ? 1
        : 0;
}
function test_shortener(){    
    $sourceStrings = array(
        'A very looooooong wooooord',
        'Loremia ipsumia dolaria sitia ameti',
        'Have you ever been to Lituania ?',
        'Anyone who reads Old and Middle',
        'English literary texts will be familiar',
        'with the mid-brown volumes of the EETS,',
        'with the symbol of Alfreds jewel embossed on the front cover.'
    );
    $testStrings = array(
        'A very looooo* wooooo*',
        'Loremi* ipsumi* dolari* sitia ameti',
        'Have you ever been to Lituan* ?',
        'Anyone who reads Old and Middle',
        'Englis* litera* texts will be famili*',
        'with the mid-br* volume* of the EETS,',
        'with the symbol of Alfred* jewel emboss* on the front cover.'
    );
    for ($i=0; $i < count($sourceStrings); $i++) {
        test($testStrings[$i], shortener($sourceStrings[$i]));
    }
}
test_shortener();
TEXT;
        $task->difficulty = 2;
        $task->user_id = 1;
        $task->is_published = 1;
        $task->save();

        //task 3

        $task = new Task();
        $task->language = 'php';
        $task->theme = 'array';
        $task->task_desc = <<<'DESC'
Функция получает на вход массив строк. Вернуть надо количество строк,
 * которые не короче двух символов и у которых первый и последний
 * символ совпадают.
 *
 * @param array $arr
 * @return number
DESC;
        $task->short_desc = 'Массивы';
        $task->task_view = <<<'TASKVIEW'
function compare_ends($arr) {
    // Your code here
}
TASKVIEW;
        $task->check_code = <<<'TEXT'
function test($received, $expected) {
    echo $expected === $received ? 1
        : 0;
}
function test_compare_ends() {    
    test(compare_ends(array('aba', 'xyz', 'aa', 'x', 'bbb')), 3);
    test(compare_ends(array('', 'x', 'xy', 'xyx', 'xx')), 2);
    test(compare_ends(array('aaa', 'be', 'abc', 'hello')), 1);
}
test_compare_ends();
TEXT;
        $task->difficulty = 2;
        $task->user_id = 1;
        $task->is_published = 1;
        $task->save();
        //task 4
        $task = new Task();
        $task->language = 'php';
        $task->theme = 'string';
        $task->task_desc = <<<'DESC'
Функция получает на вход строку, должна вернуть ее перевернутой.
 *
 * @param string $str
 * @return string
DESC;
        $task->short_desc = 'Перевертышь';
        $task->task_view = <<<'TASKVIEW'
function reverse_string($str) {
    // Your code here
}
TASKVIEW;
        $task->check_code = <<<'TEXT'
function test($received, $expected) {
    echo $expected === $received ? 1
        : 0;
}
function test_reverse_string() {   
    test(reverse_string('asdfcvbn'), 'nbvcfdsa');
    test(reverse_string('Welcome friend'), 'dneirf emocleW');
    test(reverse_string('nehzitsepmur'), 'rumpestizhen');
}
test_reverse_string();
TEXT;
        $task->difficulty = 2;
        $task->user_id = 1;
        $task->is_published = 1;
        $task->save();

        //task 5

        $task = new Task();
        $task->language = 'javascript';
        $task->theme = 'addition';
        $task->task_desc = <<<'DESC'
Функция получает на вход строку, должна вернуть ее перевернутой.
 *
 * @param string $str
 * @return string
DESC;
        $task->short_desc = 'Сложение';
        $task->task_view = <<<'TASKVIEW'
function my_sum(a, b) {
    // Your code here
}
TASKVIEW;
        $task->check_code = <<<'TEXT'
var result = '';
function test(received, expected) {
   result += (expected == received ? 1
        : 0);
}
function test_my_sum(){    
    test(10, my_sum(5, 5));
    test(15, my_sum(10, 5));
    test(15, my_sum(10, 5));
}
test_my_sum();
console.log(result);
TEXT;
        $task->difficulty = 1;
        $task->user_id = 1;
        $task->is_published = 1;
        $task->save();

        //task 6

        $task = new Task();
        $task->language = 'javascript';
        $task->theme = 'subtraction';
        $task->task_desc = <<<'DESC'
Функция получает на вход  два числа. Верните разницу этих чисел.  
DESC;
        $task->short_desc = 'Вычитание';
        $task->task_view = <<<'TASKVIEW'
function my_func(a , b) {
    // Your code here
}
TASKVIEW;
        $task->check_code = <<<'TEXT'
var result = "";
function test(received, expected) {
    result += expected === received ? 1
        : 0;
}
function test_my_sum(){    
    test(5, my_func(10, 5));
    test(10, my_func(20, 10));
    test(15, my_func(25, 10));
}
test_my_sum();
console.log(result);
TEXT;
        $task->difficulty = 1;
        $task->user_id = 1;
        $task->is_published = 1;
        $task->save();
    }
}