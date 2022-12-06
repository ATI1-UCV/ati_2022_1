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
		
		

		<script type="text/javascript" src="js1/perfil.js"></script>
		<script type="text/javascript" src="js1/index.js"></script>

		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">

		
		
		
		

		<title>ATI[UCV] 2022-1</title>
	</head>

	<?php
		//echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		session_start();
		
		$_SESSION["usuario"] = "Ioannis Morakis";
		//echo '<script>console.log("'.$_SESSION["usuario"].'");</script>';
		setcookie("usuario", $_SESSION["usuario"]);

		if(!isset($x)){

			$x = 1;
		}

		
	?>

	

	<script>
		var x = <?php echo $x; ?>;
	</script>


	<script>
		$.ajax({
			url:"http://localhost/filesPHP/ati_2022_1/getDatos.php"
		});
	</script>

	<body onload="load(); ">

		<?php include_once 'pre.php';?>
		
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

		<?php include_once 'post.php';?>
	    

		<script  src="js/script.js"></script>

		<?php
			$len = 'es';
			if(!empty($_GET['len'])){
				//echo "empty key";
	
				//echo $_GET['key'];
	
				$len = $_GET['len'];
			}
			//echo '<script>console.log("'.$len.'");</script>';
			setcookie("len", $len);
			
			//echo '<script>console.log("'.$_COOKIE["len"].'");</script>';
			//

			$ci = '24105182';
			if(!empty($_GET['ci'])){
				//echo "empty key";
	
				//echo $_GET['key'];
	
				$ci = $_GET['ci'];
			}
			setcookie("ci", $ci);

			
			
			
	
	
			if($len == 'en'){
				$json = file_get_contents('conf/configEN.json');
				
	
			}
			else if($len == 'pt'){
				$json = file_get_contents('conf/configPT.json');
	
			}
			else {
				$json = file_get_contents('conf/configES.json');
			}
			
			//echo '<script>console.log('.$json.');</script>';
			echo '<script type="text/JavaScript"> var mydata = '.$json .'; </script>'; 

			//echo '<script>console.log(mydata);</script>';    

			echo '<script type="text/JavaScript">  loadConf(mydata,'.$ci.','.$x.'); </script>';
			
		?>
	

	</body>




</html>
