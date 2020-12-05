<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>

	<header>
		<h1>TEST DE SEGURIDAD EN PHP</h1>
	</header>
 
    <?php

    	$name = $email = $comment = $genero = "";
    	$nameErr = $emailErr = $commentErr = $generoErr = "";

    	if($_SERVER["REQUEST_METHOD"] == "POST"){

    		if (empty($_POST["name"])) {
    			$nameErr = "Name is empty";
    		}
    		else{
    			$name = test_inputForm($_POST["name"]);
    		}

    		if (empty($_POST["email"])) {
    			$emailErr = "email es empty";
    		}else{
    			$email = test_inputForm($_POST["email"]);
    		}

    		if(empty($_POST["comment"])){
    			$commentErr = "comment is empty";
    		}
    		else{
    			$comment = test_inputForm($_POST["comment"]);
    		}

    		if (empty($_POST["genero"])) {
    			$generoErr = "Female is empty";
    		}else{
    			$genero = test_inputForm($_POST["genero"]);
    		}


    	}

    	function test_inputForm($data){

    		$data = trim($data);
    		$data = htmlspecialchars($data);
    		$data = stripcslashes($data);
    		return $data;

    	}
    ?>

    <form method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    	<label for="name">Name:</label>
    	<input type="text" name="name">
    	<span class="error">* <?php echo $nameErr;?></span>
    	<br><br>

    	<label for="email">Email:</label>
    	<input type="text" name="email">
    	<span class="error">* <?php echo $emailErr;?></span>
    	<br><br>

    	<label for="comment">Comment:</label>
    	<textarea name="comment" rows="5" cols="40"></textarea>
    	<span class="error">* <?php echo $commentErr;?></span>
    	<br><br>

    	<label for="genero">Genero</label>
    	<input type="radio" name="genero" value="masculino">
    	<input type="radio" name="genero" value="femenino">
    	<span class="error">* <?php echo $generoErr;?></span>
    	
    	<input type="submit"  name="submit" value="submit">

    </form>

    <?php
    	echo $name;
    	echo "<br>";
    	echo $email;
    	echo "<br>";
    	echo $genero;

    ?>

</body>
</html>