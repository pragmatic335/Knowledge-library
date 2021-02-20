<?php

class chargeCount {
    public static function Test(): Closure
    {
        $count = 0;
        return function() use (&$count) {
            $count += 1;
            return $count;
        };
    }
}

$callback = chargeCount::Test();

echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;
echo $callback() . PHP_EOL;