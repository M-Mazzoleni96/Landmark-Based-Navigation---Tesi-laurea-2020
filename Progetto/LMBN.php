<!DOCTYPE html>
<html lang="it-IT">
	
	<head>
		<title>Home Page</title>
		
		<meta charset="utf-8">
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<link rel="stylesheet" href="stile.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
		
		<script src="script.js?v=0.0.9"></script>	
		<div id="google_translate_element"></div>
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'it', includedLanguages: 'it,en,de,es,fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
	</head>
	
	
	<body>			

		
	<?php

		error_reporting(E_ALL);
		ini_set('display_errors',1);

		$filename = 'data/nodi.txt';
		$eachlines = file($filename, FILE_IGNORE_NEW_LINES);

	?>
	<main>
		<div id="pagina">
			

			
	<h1>Landmark Based Navigation</h1>
		<form action="Main.py" method="get" id="Funzione">
			<div class="row">
				<div class="col s12 m6 l2">
					<div id="etichetta">
						Partenza: 
					</div>
				</div>
				
				<div class="col s12 m6 l6">
					<select name="start">
						<?php foreach($eachlines as $lines){ 
						echo "<option value='".$lines."'>$lines</option>";
						}?>
					</select>
				
				</div>
			</div>
			
			<div class="row">
				<div class="col s12 m6 l2">
					<div id="etichetta">
						Arrivo: 
					</div>
				</div>
				
				<div class="col s12 m6 l6">
					<select name="finish" >
						<?php foreach($eachlines as $lines){ 
						echo "<option value='".$lines."'>$lines</option>";
						}?>
					</select>
				</div>
			</div>
			
			<div class="row">
				<div class="col s12 m6 l4" id="etichetta">	
					Agevolazioni per utenti disabili: 
				</div>
				
				<div class="col s15 m6 l5" id="alig">	
					
					<input type="checkbox" id="check" 		value="yes"	 name="moto" >
					<label for="check">Difficoltà motorie</label>

					<input type="checkbox" id="check2" 		value="yes"	 name="vista" >
					<label for="check2">Difficoltà visive</label>
				</div>
				
			</div>
			
			<BR>
			<button class="btn waves-effect waves-light" type="submit">Cerca
				<i class="material-icons right"><span class="notranslate">send</span></i>
			</button>
			
		</form>
		<BR>
			<a class="waves-effect waves-light btn-large" onclick="location.href='Admin.php';">
			<i class="material-icons left"><span class="notranslate">vpn_key</span></i>Pannello di controllo</a>
			</div>
		</main>
	</body>
</html>

