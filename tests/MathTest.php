<?php

namespace Test;

use PHPUnit\Framework\TestCase;

/*compExercices PHP Unit

Créer un test unitaire pour permettre une addition :

le test devra appeler une méthode Math\SimpleCacul::addition($a, $b)*/

class MathTest extends TestCase {

    private $math;

    private $francais;

    // cette methode si elle existe est appelée avant chaque appel de test
    public function setUp(): void {
        $this->math = new \Mathematique();
        $this->francais = new \Francais();
    }

    public function testAddition()
    {
        $this->assertEquals($this->math->addition(5,4), 9);
    }

    public function testSoustraction()
    {
        $this->assertEquals($this->math->soustraction(40,20), 20);
    }

    public function testMultiplication()
    {
        $this->assertEquals($this->math->multiplication(5,2), 10);
    }

    public function testDivision()
    {
        $this->assertEquals($this->math->division(14, 7), 2);
    }

    // public function testMessage()
    // {
    //     $this->assertEquals($this->francais->message($phrase1), $phrase2);
    // }
    
}