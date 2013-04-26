<?php
include 'RangeFormatter.php';
include 'PHPUnit/Autoload.php';

class RangeFormatterText extends PHPUnit_Framework_TestCase{
	
	/**
	 * if the start value given is a negative it should throw an exception
	 */
	public function testNegativeToPositiveRangeException(){
	
		try{
			$rangeFormatter = new RangeFormatter(-3, 11);
		}catch(Exception $e){
			return;
		}
		
		$this->fail('An exception was expected but not raised');

	}
	
	/**
	 * if start value is zero and end value is a higher value
	 */
	public function testZeroToPositiveRange(){
	
		$rangeFormatter = new RangeFormatter(0, 5);
		$this->assertEquals("0 1 2 Fizz 4 Buzz", $rangeFormatter->generateOutput());
	}
	
	/**
	 * if start value and end value are both negative
	 */
	public function testNegativeRangeException(){
	
		try{
			$rangeFormatter = new RangeFormatter(-8, -1);
		}catch(Exception $e){
			return;
		}
		
		$this->fail('An exception was expected but not raised');
	}
	
	/**
	 * if start value and end value is positive but start is greater than end
	 */
	public function testPositiveHigherToLowerRange(){
	
		try{
			$rangeFormatter = new RangeFormatter(16, 12);
		}catch(Exception $e){
			return;
		}
		
		$this->fail('An exception was expected but not raised');
		
	}
	
	/**
	 * if start value is positive and end value is greater than start 
	 */
	public function testPositiveLowerToHigherRange(){
	
		$rangeFormatter = new RangeFormatter(12, 16);
		$this->assertEquals("Fizz 13 14 FizzBuzz 16", $rangeFormatter->generateOutput());
		
	}
	
	/**
	 * if a non numerical value was passed as the start value
	 */
	public function testNonNumericRange(){
		
		try{
			$rangeFormatter = new RangeFormatter('se', 16);
		}catch(Exception $e){
			return;
		}
		
		$this->fail('An exception was expected but not raised');
		
	}
	
	/**
	 * if a non numerical value was passed as the end value
	 */
	public function testNonNumericRange(){
	
		try{
			$rangeFormatter = new RangeFormatter(3, 'ere');
		}catch(Exception $e){
			return;
		}
	
		$this->fail('An exception was expected but not raised');
	
	}
	
}