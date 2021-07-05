<?php
use PHPUnit\Framework\TestCase;

//fixture teste başlamadn önce uygulamamzn veya classımzn state ni belrtr

class ShopingCartTest extends  TestCase {

    protected $cart;
    protected static $db_connection = false;

    protected function setUp(): void
    {
        $this->cart = new ShopingCart;
    }

    //bu test class çağrıldığnda ilk çalışacak metod. burda ShopingCart class dan instance olştrr

    protected function tearDown(): void
    {
        unset($this->cart);
    }

        //bu test class bittiğnde çalışacak metod. setUp metodu ile olştrlan ShopingCart class instance nı ortadan kaldrr

    public static function setUpBeforeClass(): void
    {
        if (self::$db_connection) {
            return;
        }
        self::$db_connection = new \PDO('sqlite::database.db');
 
    }

    //bu class daki ilk test başlamadan bu metod çalışır

    public static function tearDownAfterClass(): void
    {
        self::$db_connection = null;
        // unlink(':database.db');
    }

    //bu metod bu classdaki son test bittikten sonra çalışcak

    public function testCorrectNumberOfItems()
    {
        $expected = 1;
        $this->cart->addItem('one');
        $result = $this->cart->amount;
        $this->assertEquals($expected, $result);
    }

    public function testCorrectProductName()
    {
        $this->cart->addItem('Apple');
        $this->assertContains('Apple', $this->cart->cartItems);
    }
  
}
