<?php

class Roma
{
    private $value = 0;

    const CODES = array(
        "M" => 1000,
        "CM" => 900,
        "D" => 500,
        "CD" => 400,
        "C" => 100,
        "XC" => 90,
        "L" => 50,
        "XL" => 40,
        "X" => 10,
        "IX" => 9,
        "V" => 5,
        "IV" => 4,
        "I" => 1
    );

    function __construct($value)
    {
        $invalidException = new InvalidArgumentException(
            "Parameter for new Roma have to be an positive Integer, a Roma String or an instance of Roma"
        );
        // can be integer
        // can be String
        // can be a Roma Instance
        // if invalid -> throw Exception
        if (is_int($value) && $value > 0) {
            $this->value = $value;
        } elseif (is_string($value)) {
            $codes = self::romanCodes();
            for ($i = 0; $i < strlen($value); $i++) {
                if (in_array($value[$i], $codes) === false) {
                    throw $invalidException;
                }
            }
            $this->value = self::deromanize($value);
        } elseif ($value instanceof self) {
            $this->value = $value->getNumber();
        } else {
            throw $invalidException;
        }
    }

    private static function romanCodes()
    {
        $array = array_keys(self::CODES);
        foreach ($array as $elementKey => $element) {
            if (strlen($element) === 2) {
                unset($array[$elementKey]);
            }
        }

        return $array;
    }

    public function getNumber()
    {
        return $this->value;
    }

    public function getRoman()
    {
        return self::romanize($this->getNumber());
    }

    public function add($value)
    {
        $value = new Roma($value);
        $value = $value->getNumber();

        return new Roma($this->getNumber() + $value);
    }

    public function sub($value) {
        $value = new Roma($value);
        $value = $value->getNumber();

        return new Roma($this->getNumber() - $value);
    }

    /**
     * @param $roman
     * @return int
     */
    public static function deromanize($roman)
    {
        $val = 0;
        $lst = 0;
        for ($i = 0; $i < strlen($roman); $i++) {
            $c = $roman[$i];
            if ($lst >= self::CODES[$c]) {
                $val += $lst;
            } else {
                $val += ($lst * -1);
            }
            $lst = self::CODES[$c];
        }

        return $val + $lst;
    }

    /**
     * @param $number
     * @return string
     */
    public static function romanize($number)
    {
        $roman_number = "";

        $values = array_values(self::CODES);
        $keys = array_keys(self::CODES);
        for ($i = 0; $i < count($values); $i++) {
            while ($number >= $values[$i]) {
                $roman_number .= $keys[$i];
                $number -= $values[$i];
            }
        }
        return $roman_number;
    }
}

?>
