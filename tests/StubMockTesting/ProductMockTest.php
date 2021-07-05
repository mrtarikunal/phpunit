<?php
use PHPUnit\Framework\TestCase;

use forStubMockTesting\Product;
use forStubMockTesting\Logger;

class ProductMockTest extends  TestCase {


    //unit test esnasında bir class metodu test edilrken başka external bir kaynağı kullanmamız gerekr
    //bunun yerine o kaynağı mock edrk kullnrz 
  
    public function testSaveProduct()
    {

        // $loggerMock = $this->getMockBuilder(Logger::class)
        // ->disableOriginalConstructor()
        // ->setMethods(['log'])
        // ->getMock();

        //yukarda log class nın mock olştrr. construct metodunu disable eder. ve log metodunun mock nı oluştrr.
        //default olarak olştrulan mock method null döner

        $loggerMock = $this->createMock(Logger::class);
        $loggerMock->expects($this->once()) // $this->never()
        //log class nı bir kere çağrılmasını beklyrz
                 ->method('log')
                 ->with(
                       $this->equalTo('error'),
                       $this->anything()
                   );
        
        $product = new Product($loggerMock);
        $product->saveProduct('Panasonic', 'price');

    }

    public function testSaveProduct2()
    {
        $loggerMock = $this->createMock(Logger::class);
        $loggerMock->expects($this->exactly(2))
        //log classnın log metodunu içinde 2 kere kullanlacğını söylyrz
            ->method('log')
            ->withConsecutive(
                //log metdonunun çağrılması sırasını belrlyrz
                 [$this->equalTo('notice'), $this->stringContains('greater than 10')],
                 [$this->equalTo('success'), $this->stringContains('was saved')],
             );

        $product = new Product($loggerMock);
        $product->saveProduct('Panasonic', 11);

    }



}
