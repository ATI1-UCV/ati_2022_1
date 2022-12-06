<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		
		

	
		

		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



		
		<script type="text/javascript" src="conf/configEN.json"></script>
		<script type="text/javascript" src="conf/configPT.json"></script>
		<script type="text/javascript" src="conf/configES.json"></script>
		
		

		<script type="text/javascript" src="js/perfil.js"></script>
		<script type="text/javascript" src="js/index.js"></script>

		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">

		
		
		
		

		<title>ATI[UCV] 2022-1</title>
	</head>

	<?php
		//echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		session_start();
		
		$_SESSION["usuario"] = "Ioannis Morakis";

		if(empty($_GET['len'])){
			//echo "empty key";

			$len = 'es';
			

		}else{
			//echo $_GET['key'];

			$len = $_GET['len'];
		}
		setcookie("len", $len);


		//
		

		if($len == 'es'){
			$json = file_get_contents('conf/configES.json');

		}
		if($len == 'en'){
			$json = file_get_contents('conf/configEN.json');
			

		}
		if($len == 'pt'){
			$json = file_get_contents('conf/configPT.json');

		}
		
		echo '<script type="text/JavaScript"> var mydata = '.$json .'; </script>';        
		echo '<script type="text/JavaScript">  load(mydata); </script>';


	?>

	<body onload="load(); ">

	    <header>
			<nav>
				<ul>
					<li class="logo" id="logo"></li>
					<li class="saludo" id="saludo"></li>
					<li class="busqueda">
						<input type="text" id="search" name="search" value="..." >
						<input type="button" value="Buscar" onclick="myFunction()" ></li>
				</ul>	
			</nav> 
	    </header>
		
	    <section>

			<body>
				


						<div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
							<div class="carousel-inner" id="lista"></div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" ></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
								<span class="carousel-control-next-icon"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>


			
			 
	    </section>
	    <footer id="copyRight">
	    </footer>

		<script  src="js/script.js"></script>
	</body>




</html>
