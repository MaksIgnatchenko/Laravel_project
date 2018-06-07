<?php
vfunction test($received, $expected) {
    echo $expected === $received ? "OK"
        : "Fail";
}
function test_my_sum(){
    echo "We are testing my_sum!" . PHP_EOL;
    test(12, my_sum(array(10, 2, 0)));
    test(144, my_sum(array(10, 20, 100, 14)));
    test(12, my_sum(array(-50, 200, -100, -50, 12)));
}
test_my_sum();