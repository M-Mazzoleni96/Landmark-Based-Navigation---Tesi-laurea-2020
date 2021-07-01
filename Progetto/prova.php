<!DOCTYPE html>
<html>
	<head>
		<title>Pannello di controllo</title>
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
		<script src="script.js?v=0.0.2"></script>	
		
		
		
		<!--da qua-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/black-tie/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            $("#dialog").dialog({
                open: function (event, ui) {
                    $(this).parent().css('position', 'fixed');
                },
               width:'500'
            });
        });
    </script>
	<!--a qua-->
	
	</head>
	<?php

		error_reporting(E_ALL);
		ini_set('display_errors',1);
	
		$filename = 'data/nodi.txt';
		$eachlines = file($filename, FILE_IGNORE_NEW_LINES);
		$filearco = 'data/grafo.txt';
		$eachlinesA = file($filearco, FILE_IGNORE_NEW_LINES);
	
	?>
	
	<body >
	<!--da qua-->
	<div id="dialog" title="Prompt" >
        <table>
          <tr>
            <td>
              Enter Your Name<br/>
            
            
              <input type="textbox" id="textbox1" />
            </td>
          </tr>
      </table>
           
       
      
    </div>
	<!--a qua-->
		<div id="pagina">
			<h1>Pannello di controllo</h1>
			<a class="waves-effect waves-light btn-large" onclick="location.href='LMBN.php';">
			<i class="material-icons left">arrow_back</i>Torna a Homepage</a>
			<div id="funzione">
				<form enctype="multipart/form-data" action="upload_file.php" method="POST">
				
					<h2>Aggiungi Nodo</h2>
					<BR>
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">
							A quale nodo vuoi collegarti?: 
						</div>
						
						<div class="col s12 m6 l4">
							<select name="n1">
								<?php foreach($eachlines as $lines){ 
									echo "<option value='".$lines."'>$lines</option>";
								}?>
							</select>
						</div>
						
					</div>
					
					<div class="row">
					
						<div class="col s12 m6 l4" id="etichetta">
							Nome nuovo nodo: 
						</div>
						
						<div class="col s12 m6 l4">
							<input type="text" placeholder="Nome nuovo nodo" name="n2" ><BR>
						</div>
						
					</div>
					
					<div class="row">
					
						<div class="col s12 m6 l4" id="etichetta">
							Distanza tra i nodi: 
						</div>
						
						<div class="col s12 m6 l4">
							<input type="text" placeholder="Distanza tra i nodi" name="n3" >
						</div>
						
					</div>
					
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">
							Azione da compiere: 
						</div>
						
						<div class="col s12 m6 l4">	
							<input type="text" placeholder="Azione da compiere" name="n4" >
						</div>
						
					</div>
					
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">	
							Come si collega all'altro nodo?: 
						</div>
						
						<div class="col s12 m6 l4">	
							<select name="n5">
								<option value='"svolta a destra"'>Destra</option>
								<option value='"svolta a sinistra"'>Sinistra</option>
								<option value='"prosegui dritto"'>Vai avanti</option>
							</select>
						</div>
						
					</div>
					
					<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
					<div id="file">
						Invia questo file: <input name="userfile" type="file">
					</div>
					
					
					
					
					
					<button class="btn waves-effect waves-light" type="submit" name="action">Invia File
						<i class="material-icons right">send</i>
					</button>
					
				</form>
			</div>
			
			<BR>
			
			<div id="funzione">
				<form action="CancellaNodo.py" method="get">
					<h2>Elimina Nodo</h2>
					
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">
							Quale nodo vuoi Eliminare?: 
						</div>
						
						<div class="col s12 m6 l4">
							<select name="delet">
								<?php foreach($eachlines as $lines){ 
								echo "<option value='".$lines."'>$lines</option>";
								}?>
							</select>
						</div>
						
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Elimina
						<i class="material-icons right">clear</i>
					</button>
					
				</form>
			</div>
			
			<BR>
			
			<div id="funzione">
				<form action="RinominaNodo.py" method="get">
					<h2>Rinomina Nodo</h2>
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">	
							Quale nodo vuoi Modificare?: 
						</div>
						<div class="col s12 m6 l4">	
							<select name="nr1">
								<?php foreach($eachlines as $lines){ 
								echo "<option value='".$lines."'>$lines</option>";
								}?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">	
							Nuovo nome: 
						</div>
						
						<div class="col s12 m6 l4">	
							<input type="text" placeholder="Nuovo nome" name="newN" >
						</div>
						
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Rinomina
						<i class="material-icons right">edit</i>
					</button>
				</form>
			</div>
			<BR>
			
			
			
			<div id="funzione">
				<form action="ModificaNodo.py" method="get">
					<h2>Modifica Arco</h2>
					<div class="row">
			
						<div class="col s12 m6 l4" id="etichetta">	
							Rercord 
						</div>
						
						<div class="col s12 m6 l4">	
							<select name="nm1">
								<?php foreach($eachlinesA as $lines){ 
								echo "<option value='".$lines."'>$lines</option>";
								}?>
							</select>
						</div>
					</div>	
					
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">	
							Distanza: 
						</div>
						
						<div class="col s12 m6 l4">	
							<input type="text" placeholder="Distanza" name="newDist" >
						</div>
					</div>
					
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">	
							Azione: 
						</div>
						
						<div class="col s12 m6 l4">	
							<input type="text" placeholder="Azione" name="newAct" >
						</div>
					</div>
					
					<div class="row">
						<div class="col s12 m6 l4" id="etichetta">	
							Svolta: 
						</div>
						
						<div class="col s12 m6 l4">	
							<select name="newTurn">
								<option value="svolta a destra">Destra</option>
								<option value="svolta a sinistra">Sinistra</option>
								<option value="prosegui dritto">Vai avanti</option>
							</select>
						</div>
					</div>
										
					<button class="btn waves-effect waves-light" type="submit" name="action">Modifica
						<i class="material-icons right">build</i>
					</button>
					
				</form>	
			</div>
			
		</div>
	</body>
</html>
