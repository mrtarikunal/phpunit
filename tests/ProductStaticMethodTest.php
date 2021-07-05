<?php
use PHPUnit\Framework\TestCase;

class ProductStaticMethodTest extends  TestCase {


    public function testProduct()
    {
        // $product = new Product(new Session);
        $session = new class implements SessionInterface {
            public function open() {}
            public function close() {}
            public function write($product)
            {
                echo 'mocked writing to the session '. $product;
            }
        };
        $product = new ProductStatic($session);
        $product->setLoggerCallable(function(){
            echo 'Real Logger was not called!';
        });
        $this->assertSame('product 1',$product->fetchProductById(1));
    }

}
