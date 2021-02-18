<?php
/**
 * __get($property)
 * __set($property, $value)
 * __isset($property)
 * __unset($property)
 * __call($method, $arg_array)
 * __callStatic($method, $arg_array)
 */

/**
 * Class DemonstrationInterception
 */
class DemonstrationInterception {

    private $name;

    private function getRandomWord() {
        return 'good';
    }

    public static function getRandomNumber(): int
    {
        return rand(0,100);
    }

    public function __get(string $property) {
        $method = 'get' . $property;
        if(method_exists($this, $method)) {
            return $this->$method();
        }
        return null;
    }

    public function __set($property, $value) {
        $method = "set{$property}";
        if(method_exists($this, $method)) {
            return $this->$method($value);
        }
    }
    public function __isset($property) {
        $method = "get{$property}";
        return method_exists($this, $method);
    }
    public function __unset($property) {
        $method = "set{$property}";
        if(method_exists($this, $method)) {
            $this->$method(null);
        }
    }

    public function __call($method, $args) {
        if(method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public static function __callStatic($method, $args) {
       return static::getRandomNumber();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

}

$test  = new DemonstrationInterception();

echo $test->getRandomWord();
