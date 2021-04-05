<?php
// tree as 7.2.0
//    Error
//      ArithmeticError
//        DivisionByZeroError
//      AssertionError
//      ParseError
//      TypeError
//        ArgumentCountError
//    Exception
//      ClosedGeneratorException
//      DOMException
//      ErrorException
//      IntlException
//      LogicException
//        BadFunctionCallException
//          BadMethodCallException
//        DomainException
//        InvalidArgumentException
//        LengthException
//        OutOfRangeException
//      PharException
//      ReflectionException
//      RuntimeException
//        OutOfBoundsException
//        OverflowException
//        PDOException
//        RangeException
//        UnderflowException
//        UnexpectedValueException
//      SodiumException

//all subclasses of error :)
function Test() {
    switch (rand(0, 5)) {
        case 1:
            throw new ParseError();
        case 2:
            throw new DivisionByZeroError();
        case 3:
            throw new TypeError();
        case 4:
            throw new AssertionError();
        case 5:
            throw new ArithmeticError();

    }

}

Test();

