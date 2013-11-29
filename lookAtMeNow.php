<?
/*
	- Look At My Code
	A lightweight code box for displaying scripts/codes.
*/

class lookAtMyCode {
	/*
		This variable has one of two uses:
		1) [array] An array of all the code files to output
		2) [string] a path to a single file to output
	*/
	public static $code;
	
	/*
		- Construct
		Sets the contents when the object is defined (optional)
	*/
	function __construct($file = NULL) {
		if (!is_null($file) && is_array($file)) {
			set($file);
		}
	}
	
	/*
		- Set contents
		set($file[string || array])
		
		Set the contents of the code box. Argument can be either an array of scripts [array]
		or a single script [string]. LookAtMyCode with add all provided files to its global
		variable [array], with the file extension as the key.
	*/
	public function set($file) {
		//Check for single file [string]
		if (!is_array($file)) {
			//Convert into singe array
			$file = array($file);
		}
		//Get all code required
		foreach($file as $val) {
			//Check for existing file
			if (file_exists($val)) {
				//Get extension
				$ext = explode(".", $val);
				$ext = end($ext);
				//Get file contents (if they exists) into array by lines
				static::$code[$ext] = file_exists($val) ? file($val) : "";
			}
		}
	}
	
	/*
		- Display
		Display the code box with the set contents. If the contents are not set, a default
		view [custom error] will be displayed.
	*/
	public function display() {
		if (file_exists("body.php")) {
			require 'body.php';
		}
	}
	
	/*
		- Set & Display
		A short-hand version of display the codebox.
	*/
	public function compile($file) {
		$this->set($file);
		$this->display();
	}
	
}

?>
