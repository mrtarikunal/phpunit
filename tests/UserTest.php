<?php
use PHPUnit\Framework\TestCase;

class UserTest extends  TestCase {

    use CustomAssertionTrait;


    //testing private and protected class attributes


    public function testValidUserName()
    {
        $phpunit = $this;
        $user = new User('donald', 'Trump');
        $expected = 'Donald';
        $assertClosure = function ()  use ($phpunit,$expected){
            $phpunit->assertSame($expected, $this->name);
        };
        $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));
        $executeAssertClosure();
        // $this->assertSame($expected, $user->name);
    }

    //private attrbute için

    public function testValidUserName2() 
    {
        $user = new class('donald', 'Trump') extends User {
            public function getName()
            {
                return $this->name;
            }
        };
        $this->assertSame('Donald', $user->getName());
    }

    //protected attr için


     public function testValidDataFormat() 
    {
        $user = new User('donald', 'Trump');
        $mockedDb = new class extends Database {

            public function getEmailAndLastName()
            {
                echo 'no real db touched!';
            }
        };

        $setUserClosure = function ()  use ($mockedDb){
            $this->db = $mockedDb;
        };
        $executeSetUserClosure = $setUserClosure->bindTo($user, get_class($user));
        $executeSetUserClosure();

        $this->assertSame('Donald Trump', $user->getFullName());
    }

    public function testPasswordHashed()
    {
        $phpunit = $this;
        //$this burda UserTest class nı ifade edyr
        $user = new User('donald', 'Trump');
        $expected = 'password hashed!';
        $assertClosure = function ()  use ($phpunit,$expected){
            $phpunit->assertSame($expected, $this->hashPassword());
        };

        //closure kullnarak $this User class nı ifade etmeye başlyr. yani scope nu değştryrz
        $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));
        $executeAssertClosure();
    }

    public function testPasswordHashed2() 
    {
        $user = new class('donald', 'Trump') extends User {
            public function getHashedPassword()
            {
                return $this->hashPassword();
            }
        };
        $this->assertSame('password hashed!', $user->getHashedPassword());
    }

    public function testCustomDataStructure()
    {
        $data = [
            'nick' => 'Dolar',
            'email' => 'donald@trump.mxn',
            'age' => 70
        ];
        $this->assertArrayData($data);
    }

    //hazır gelen test metodlarını tek tek uygulamaktansa custum bir şey yazıp topluca uyguladk

}
