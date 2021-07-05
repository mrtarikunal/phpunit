<?php
use PHPUnit\Framework\TestCase;

class UsefulAnnotationsTest extends  TestCase {

    private $value;
    /**
     * @before
     */
    public function runBeforeEachTestMethod()
    {
        $this->value = 1;
    }

    //@before annatation ile tüm testler öncesi bu metod çalşr

    /**
     * @after
     */
    public function runAfterEachTestMethod()
    {
        unset($this->value);
    }

        //@after annatation ile tüm testler sonrası bu metod çalşr
        //mesela before ile db connection başltrz, after ile sonlandrz gibi

    public function testAnnotations1()
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($expected,$result);
    }

    public function testAnnotations2()
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($expected,$result);
    }

}

// @beforeClass
// @afterClass
// @dataProvider
