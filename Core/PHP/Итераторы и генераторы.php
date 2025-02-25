<?php

/**
 * Итератор есть интерфейс <Iterator>
 * Предназначен для внешних итераторов или объектов, которые умеют итерироваться сами
 */

<<<CODE

interface Iterator extends Traversable {
    /* Методы */
    public current(): mixed
public key(): mixed
public next(): void
public rewind(): void
public valid(): bool
}
CODE;

/**
 * PHP предоставляет возможность пройтись по видимым свойствам объекта, например при помощи <foreach>
 */

/**
 * <Генераторы> - это легкий способ реализации простых итераторов
 * Генератор использует ключевое слово yield
 * Пример:
 */

function simpleGenerator(): Generator
{
    yield 1;
    yield 2;
    yield 3;
}

/**
 * Делегирование генератора через yield from
 * Делегирование генератора позволяет получать значения из другого генератора,
 *              объекта Traversable или массива через ключевые слова yield from.
 * Пример:
 */

function inner(): Generator
{
    yield 1; // Ключ 0
    yield 2; // Ключ 1
    yield 3; // Ключ 2
}

function gen(): Generator
{
    yield 0; // Ключ 0
    yield from inner(); // Ключи 0-2
    yield 4; // Ключ 1
}

// Задайте false вторым параметром для получения массива [0, 1, 2, 3, 4]
var_dump(iterator_to_array(gen()));
//result 0 1 2 3 4


/** Еще примеры */
function count_to_ten(): Generator
{
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    return yield from nine_ten();
}

function seven_eight(): Generator
{
    yield 7;
    yield from eight();
}

function eight(): Generator
{
    yield 8;
}

function nine_ten()
{
    yield 9;
    return 10;
}

$gen = count_to_ten();

foreach ($gen as $num) {
    echo "$num ";
}

echo $gen->getReturn();

//result 1 2 3 4 5 6 7 8 9 10
