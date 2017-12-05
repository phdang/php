<?php 

	class customException extends Exception {

		public function errorMessage(){

			//error message

			$errorMsg = 'Error on line ' . $this ->getLine().' in '.$this->getFile()

			.': <b>' . $this -> getMessage() . '</b> is not a valid E-mail address';

			return $errorMsg;
		}
	}

	$email = "someone@example...com";

	try {
		//check if

		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

			//throw exception if email is not valid

			throw new customException($email);
		}

		//check for "example" in mail address

		if(strpos($email, "example") !== FALSE) {
			
			throw new Exception("$email is an example e-mail");
		}
	}

	catch (customException $e) {
		//display custom message

		echo $e -> errorMessage();
	}

	catch (Exception $e) {

		echo $e -> getMessage();
	}
/*
	//Create function with an exception

	function checkNum($number) {
		if($number>1){

			throw new Exception("Value must be 1 or below");
		}

		return true;
	}
	
	//Trigger exception
	try {
		checkNum(2);
		//If the exception is thrown, this text will not be shown

		echo 'If the exception is thrown, this text will not be shown';

	}

	//Catch exception

	catch(Exception $e) {

		echo 'Message: ' . $e -> getMessage();
	}
*/
?>
