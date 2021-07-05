<?php
use PHPUnit\Framework\TestCase;

class EmailTest extends  TestCase {

    /**
     * @dataProvider emailsProvider
     */
    public function testValidEmail($email)
    {
        $this->assertRegExp('/^.+\@\S+\.\S+$/', $email);
    }

    //@dataProvider ile emailsProvider fonks çağrp ordan gelen array email listesini testValidEmail fonk veryrz
   //$email sadece tek değişken var çünkü emailsProvider fonkda arrayin her elemanı tek


    /**
     * @dataProvider numbersProvider
     */
    public function testMath($a, $b, $expected)
    {
        $result = $a*$b;
        $this->assertEquals($expected, $result);
    }

       //$a, $b, $expected üç değişken var çünkü numbersProvider fonkda arrayin her elemanında 3 eleman var


    public function emailsProvider()
    {
        return [
            ['dsds@ffs.df'],
            ['dsds@ffs.dffdfd'],
            ['dsds@ffs'],
        ];
    }

    public function numbersProvider()
    {
        return [
            [1,2,2],
            [2,2,4],
            [3,3,10],
        ];
    }

}
