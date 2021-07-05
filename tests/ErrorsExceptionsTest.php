<?php
use PHPUnit\Framework\TestCase;

class ErrorsExceptionsTest extends TestCase {

   public function testErrorCanBeExpected(): void
    {
        $this->expectError();

        $this->expectErrorMessage('foo');

        \trigger_error('foo', \E_USER_ERROR);
        // $file = fopen("test.txt", "r");
    }

    // :void ile bu fonk bir değer dönmeyecek sadece çağrlck diyrz. php7 den sonra geldi
    //$this->expectError(); bir error dönmesini beklyr
    //$this->expectErrorMessage('foo'); ise foo hata mesajı dönülmesini bekler


    public function testException()
    {
        $this->expectException(WrongBmiDataException::class);
        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 0; // kg
        $BMICalculator->height = 1.6; // m
        $BMICalculator->calculate();
    }

    //$this->expectException() exception dönmesini beklyr. önce yazyrz

}
