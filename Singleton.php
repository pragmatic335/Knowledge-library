<?php

class IamOne {

    private static $instance;
    private $property;

    private function __construct() {
    }

    private function __clone() {

    }

    private function __wakeup() {
    }

    public static function getInstance() : IamOne {
        if(self::$instance == null) {
            self::$instance = new IamOne();
        }
        return self::$instance;
    }

    public function set($value) {
        $this->property = $value;
    }
    public function get() {
        return $this->property;
    }
}

$example1 = IamOne::getInstance();
$example1->set('hello123');
$example2 = IamOne::getInstance();
echo $example2->get();

