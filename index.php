<?

//Call external file/class
require 'lookAtMyCode.php';

//Create object from class
$lamc = new lookAtMyCode();

?>
<html>
	<head>
		<title>Code Viewer</title>
		<!-- jQuery (needed) -->
		<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<!-- Javascript -->
		<script type="text/javascript" src="javascript.js"></script>
		<!-- Stylesheet -->
		<link type="text/css" rel="stylesheet" href="style.css"></style>
	</head>
	<body>
		<?
		
		//Compile and display the code box 
		$lamc->compile(
			array(
				"codes/project1/html.html",
				"codes/project1/css.css",
				"javascript.js"
			)
		);
		
		//Use this to test the error display
		//$lamc->display();
		
		?>
	</body>
</html>
