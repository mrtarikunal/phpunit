<?php
use PHPUnit\Framework\TestCase;

//.\vendor\bin\phpunit tests\UsefulAssertionsTest --color --testdox

class UsefulAssertionsTest extends  TestCase {

    public function testAssertSame()
    {
        $expected = 'baz';
        $result = 'BAZ';
        $this->assertSame($expected,$result);
    }

    public function testAssertEquals()
    {
        $expected = 1;
        $result = 2;
        $this->assertEquals($expected,$result);
    }

    public function testAssertEmpty()
    {
        $this->assertEmpty(['foo']);
    }

    public function testAssertNull()
    {
        $this->assertNull(['foo']);
    }

    public function testAssertGreaterThan()
    {
        $expected = 2;
        $actual = 1;
        $this->assertGreaterThan($expected, $actual);
    }

    public function testAssertFalse()
    {
        $this->assertFalse(true);
    }

    public function testAssertTrue()
    {
        $this->assertTrue(false);
    }

    public function testAssertCount()
    {
        $this->assertCount(3, [1,2]);
    }

    public function testAssertContains()
    {
        $this->assertContains(4, [1, 2, 3]);
        //4 array içinde varmı kontrol eder
    }

    public function testAssertStringContainsString()
    {
        $searchFor = 'foo';
        $searchIn = 'baz';
        $this->assertStringContainsString($searchFor, $searchIn);
    }

    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf(RuntimeException::class, new Exception);
        //new Exception nın RuntimeException::class bu class ın bir instance olup olmadığını sorgular

    }

    public function testAssertArrayHasKey()
    {
        $this->assertArrayHasKey('bazf', ['baz'=>'bar']);
        //bazf key değerinin array içindeki key değerleri içinde olup olmadığı
    }

    public function testAssertDirectoryIsWritable()
    {
        $this->assertDirectoryIsWritable('/path/to/directory');
    }

    public function testAssertFileIsWritable()
    {
        $this->assertFileIsWritable('/path/to/file');
    }

}
