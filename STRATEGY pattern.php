<?php
abstract class Lesson
{
    private int $duration;
    private CostStrategy $costStrategy;

    public function __construct(int $duration, CostStrategy $strategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }

    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    public function getDuraction()
    {
        return $this->duration;
    }
}

class Seminar extends Lesson
{

}

class Lecture extends Lesson
{

}


abstract class CostStrategy {
    abstract public function cost(Lesson $lesson): int;
    abstract public function chargeType(): string;
}

class TimedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return ($lesson->getDuraction() * 5);
    }

    public function chargeType(): string
    {
        return 'Почасовая оплата';
    }

}

class FixedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    public function chargeType(): string
    {
        return 'Фиксированная ставка';
    }

}

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FIxedCostStrategy());

foreach($lessons as $lesson)
{
    print "Оплата за занятие {$lesson->cost()}.";
    print "Тип оплаты {$lesson->chargeType()} \n";
}




