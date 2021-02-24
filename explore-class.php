<?php

class ClassInfo {

    public static function getData(ReflectionClass $class)
    {
        $details = '';
        $name = $class->getName();

        if($class->isUserDefined()) {
            $details .= "$name -- класс определен пользователем \n";
        }

        if($class->isInternal()) {
            $details .= "$name -- встроенный класс \n";
        }

        if($class->isInterface()) {
            $details .= "$name -- интерфейс класс \n";
        }

        if($class->isFinal()) {
            $details .= "$name -- финальный класс \n";
        }

        if($class->isInstantiable()) {
            $details .= "$name -- можно создать экземляр объекта \n";
        }

        if($class->isCloneable()) {
            $details .= "$name -- можно клонировать \n";
        } else {
            $details .= "$name -- нельзя клонировать";
        }

        return $details;

    }

    public static function getClassSource(ReflectionClass $class): string
    {
        $path = $class->getFileName(); //абсолютный путь до файла, где расположен исследуемый класс
        $lines = file($path);

        $from = $class->getStartLine();
        $to = $class->getEndLine();

        $len = $to - $from + 1;

        /**
         * implode - массив в строку
         * array_splice - вырезает часть массива
         */
        return implode(array_splice($lines, $from - 1, $len));

    }

}





//echo ClassInfo::getData(new ReflectionClass('\ClassInfo'));
echo ClassInfo::getClassSource(new ReflectionClass('\ClassInfo'));


