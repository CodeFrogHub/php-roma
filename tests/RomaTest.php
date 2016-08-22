<?php

use Service\Roma;

class RomaTest extends PHPUnit_Framework_TestCase {
    /**
     * @dataProvider deromanizeDataProvider
     */
    public function testDeromanize($case, $expected) {
      $this->assertEquals(ROMA::deromanize($case), $expected);
    }

    public function deromanizeDataProvider()
    {
        return [
            ['I', 1],
            ['II', 2],
            ['IV', 4],
            ['MXM', 1990]
        ];
    }
}
?>
