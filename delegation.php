<?php

//delegation example
class Writer {

    public function writeName() {
        return 'Genadii';
    }

    public function writeAge() {
        return '25';
    }
}

class Person {
    public $writer;

    public function __construct(Writer $writer)
    {
        $this->writer = $writer;
    }

    public function __call($method, $args) {
        if(method_exists($this->writer, $method)) {
            return $this->writer->$method();
        }
    }

}

$vasya = new Person(new Writer());
echo $vasya->writeName();