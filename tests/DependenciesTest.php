<?php
use PHPUnit\Framework\TestCase;

class DependenciesTest extends  TestCase {

    private $value;

    public function testFirstTest()
    {
        $this->value = 1;
        $this->assertEquals(1,$this->value);
        return $this->value;
    }

    /**
     * @depends testFirstTest
     */
    public function testDependency1($value)
    {
        $value++;
        $expected = 2;
        $result = $value;
        $this->assertEquals($expected,$result);
        return $value;
    }

    //@depends annotation ile testDependency1 fonk ile testFirstTest fonk arasında dependency olştryz
    //testFirstTest çalşyr value değerini döyr ve bu fonk da kullanlyr

    /**
     * @depends testDependency1
     */
    public function testDependency2($value)
    {
        $value++;
        $expected = 2;
        $result = $value;
        $this->assertEquals($expected,$result);
    }

}
