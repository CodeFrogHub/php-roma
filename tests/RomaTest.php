<?php

class RomaTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider constructorDataProvider
     * @param $case
     */
    public function testConstructorException($case)
    {
        $this->expectException(InvalidArgumentException::class);
        new Roma($case);
    }

    /**
     * @dataProvider addDataProvider
     * @param $value1
     * @param $value2
     * @param $add
     * @param $willFail
     */
    public function testAdd($value1, $value2, $add, $willFail)
    {
        if($willFail === true) $this->expectException(InvalidArgumentException::class);
        $roma = new Roma($value1);
        $result = $roma->add($value2);
        $this->assertEquals($result->getRoman(), $add);
    }

    /**
     * @dataProvider subDataProvider
     * @param $value1
     * @param $value2
     * @param $sub
     * @param $willFail
     */
    public function testSub($value1, $value2, $sub, $willFail)
    {
        if($willFail === true) $this->expectException(InvalidArgumentException::class);
        $roma = new Roma($value1);
        $result = $roma->sub($value2);
        $this->assertEquals($result->getRoman(), $sub);
    }

    /**
     * @dataProvider romansDataProvider
     * @param $case
     * @param $expected
     */
    public function testGetNumber($case, $expected)
    {
        $roma = new Roma($case);
        $this->assertEquals($roma->getNumber(), $expected);
    }

    /**
     * @dataProvider romansDataProvider
     * @param $expected
     * @param $case
     */
    public function testGetRoman($expected, $case)
    {
        $roma = new Roma($case);
        $this->assertEquals($roma->getRoman(), $expected);
    }

    /**
     * @dataProvider romansDataProvider
     * @param $case
     * @param $expected
     */
    public function testDeromanize($case, $expected)
    {
        $this->assertEquals(Roma::deromanize($case), $expected);
    }

    /**
     * @dataProvider romansDataProvider
     * @param $expected
     * @param $case
     */
    public function testRomanize($expected, $case)
    {
        $this->assertEquals(Roma::romanize($case), $expected);
    }

    /**
     * Providers
     */
    public function constructorDataProvider()
    {
        // test with number
        // test with String
        // test with Roma

        // test invalid Numbers
        // test invalid Strings
        return [
            // FAILS
            [0],
            [-1],
            ['ASD'],
            ['ABC'],
            ['MMR'],
            ['mCM']
        ];
    }

    public function romansDataProvider()
    {
        return [
            ['I', 1],
            ['II', 2],
            ['IV', 4],
            ['MCMXC', 1990],
            ['IX', 9],
            ['XI', 11],
            ['MMXVI', 2016]
        ];
    }

    public function addDataProvider()
    {
        return [
            [1, 2, 'III', false],
            [5, 4, 'IX', false],
            [20, 15, 'XXXV', false],
            [9, 7, 'XVI', false],
            [2000, 10, 'MMX', false]
        ];
    }

    public function subDataProvider()
    {
        return [
            [2, 1, 'I', false],
            [1, 2, 'I', true],
            [5, 4, 'I', false],
            [20, 15, 'V', false],
            [9, 7, 'II', false],
            [2000, 10, 'MCMXC', false]
        ];
    }
}

?>
