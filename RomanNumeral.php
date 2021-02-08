<html>
<head>
<title>Roman Numeral Assessment</title>
</head>
<body>
<?php

class RomanNumeral
{
    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function convertToInt($char){
			switch($char) 
			{
			case 'I':
				return 1;
			case 'V':
				return 5;
			case 'X':
				return 10;
			case 'L':
				return 50;
			case 'C':
				return 100;
			case 'D':
				return 500;
			case 'M':
				return 1000;
			default:
				throw new Exception("Invalid Numeral");
			}
	}
	
	public function toInt():int
    {
        $total = 0;
		
		$total = $this->convertToInt(substr($this->numeral, 0, 1));
		
		
			for ($i = 0; $i < strlen($this->numeral) - 1; $i++) {
				
				if ($this->convertToInt(substr($this->numeral, $i, 1)) < $this->convertToInt(substr($this->numeral, $i + 1, 1))) {
					$total = $this->convertToInt(substr($this->numeral, $i + 1, 1)) - $total;
				} 
				else 
				{
					$total = $total + $this->convertToInt(substr($this->numeral, $i + 1, 1));
				}
			}
			
		return $total;
	}
}

	$values = array("X", "IX", "V", "IV", "ABC", "MMX", "III", "CD");

	for ($i = 0; $i < count($values); $i++){
		try {
			echo $values[$i] . " in decimal is " . (new RomanNumeral($values[$i]))->toInt() . "<br>";
		} 	
		catch (Exception $e)
		{
			echo "Error in " . $values[$i] . ". " .$e->getMessage() . "<br>";
		}
	}
?>
</body>
</html>