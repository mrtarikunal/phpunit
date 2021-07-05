<?php
use PHPUnit\Framework\TestCase;

//.\vendor\bin\phpunit tests --color --testdox
//.\vendor\bin\phpunit tests --color --testdox-html test_result.html
//.\vendor\bin\phpunit tests --color --testdox-html test_result.xml
//.\vendor\bin\phpunit tests --color --testdox-html test_result.text
//".\vendor\bin\phpunit" phpunit yolu,"tests" test file larının olduğu dosya,
// "--color" test sonucunu reknli göstermek için, "--testdox" daha detaylı bilgi göstermesi için
//test sonucunu html, xml veya txt de gösterblyrz
//phpunit.xml içine colors="true" eklyrkde renkli göstrblrz. her seferinde --color yazmamıza gerek kalmaz
//phpunit.xml içine testdox="true" eklylblrz. her seferinde --testdox yazmamıza gerek kalmaz

//phpunit.xml içine testsuites ekleyrk tüm test class nın veya bir directory verrk o directory altındaki tüm testlerin çalışmasını sağlyblrz
//.\vendor\bin\phpunit --testsuite BMI şeklinde çalştrlr

//fonk isimleri test ile başlamak zorunda
//testdox yaptğmzda fonk isimindeki test tensonrası alır ve açıklama gibi gösterr

class BMICalculatorTest extends  PHPUnit\Framework\TestCase {

    //const BASEURL = 'http://localhost:8000';
    // bu class constantı

   // public function __construct() {
   //     parent::__construct();
   //     define('BASEURL', 'http://localhost:8000');
   // }
    //burda php constantı tanmlyrz. ama böyle yaparsak tüm test classlarında bunu tanımlammz gerekck


   //<php>
     //   <const name="BASEURL" value="http://localhost:8000"/>
    //</php>
    //phpunit.xml içinde const tanımladık. böylelikle tüm test classları kullanablck


    public function testShowsUnderweightWhenBmiLessThan18()
    {
        $expected = 'Underweight';
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 10;
        $result = $BMICalculator->getTextResultFromBMI();
        $this->assertSame($expected, $result);

    }

    public function testShowsNormalWhenBmiBetween1825()
    {
        $expected = 'Normal';
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 24;
        $result = $BMICalculator->getTextResultFromBMI();
        $this->assertSame($expected, $result);

    }

    public function testShowsOverweightWhenBmiGreaterThan25()
    {
        $expected = 'Overweight';
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 28;
        $result = $BMICalculator->getTextResultFromBMI();
        $this->assertSame($expected, $result);

    }

    public function testCanCalculateCorrectBmi()
    {
        $expected = 39.1;
        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 100; // kg
        $BMICalculator->height = 1.6; // m
        $result = $BMICalculator->calculate();
        $this->assertEquals($expected, $result);
        $this->assertEquals(BASEURL, 'http://localhost:8000');
        //BASEURL bir const ve phpunit.xml içinde tanımladık
    }
}
