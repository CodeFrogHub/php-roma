<?php
class Roma {

  private $value = 0;
  static $r_no = array("M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I");
  static $no = array(1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1);

  public function add($value) {
    // WHAT IS VALUE

    // ADD VALUE TO CURRENT VALUE
    return new Roma($this->value + $value);
  }

	public static function deromanize($nummber) {

	}

  public static function romanize($number) {
    $r_no = array("M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I");
		$no = array(1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1);
		$roman_number = "";

		for ($i = 0; $i < count($no); $i++) {
			while ($nummber >= $no[$i]) {
				$roman_number .= $r_no[$i];
				$nummber -= $no[$i];
			}
		}
    return $roman_number;
  }

  /*function Nummber($roman_number) {
		$r_no = array("M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I");
		$no = array(1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1);
		$number = "";
    substr_count();

		for ($i = 0; $i < count($no); $i++) {


			while ($nummber >= $no[$i]) {
				$roman_number .= $r_no[$i];
				$nummber -= $no[$i];
			}
		}
    return $roman_number;
	}*/
}
?>
