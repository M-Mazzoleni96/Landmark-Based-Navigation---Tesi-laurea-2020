<?php

function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);        
        }
        // then rewrite the rotated image back to the disk as $filename 
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}

// per prima cosa verifico che il file sia stato effettivamente caricato
if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
  echo 'Non hai inviato nessun file...';
  exit;    
}

//percorso della cartella dove mettere i file caricati dagli utenti
$uploaddir = "C:/xampp/htdocs/test/Progetto/img/";

//Recupero il percorso temporaneo del file
$userfile_tmp = $_FILES['userfile']['tmp_name'];

//recupero il nome originale del file caricato

$userfile_name = $_POST['n1'].$_POST['n2'].'.jpg';
//

//$_FILES['userfile']['name'];

//copio il file dalla sua posizione temporanea alla mia cartella upload
//move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)
if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
	
  //Se l'operazione è andata a buon fine...
  echo 'File inviato con successo!';
  
  $n1 = $_POST['n1'];
  $n2 = $_POST['n2'];
  $n3 = $_POST['n3'];
  $n4 = $_POST['n4'];
  $n5 = $_POST['n5'];
  $n6 = $_POST['n6'];
  $n7 = $_POST['n7'];
  
  echo $n1;
  echo $n2;
  echo $n3;
  echo $n4;
  echo $n5;
  echo $n6;
  echo $n7;
  
  
  #$n1=shell_exec("python NuovoNodo.py "  .n1);
  #$n2=shell_exec("python NuovoNodo.py "  .n2);
  #$n3=shell_exec("python NuovoNodo.py "  .n3);
  #$n4=shell_exec("python NuovoNodo.py "  .n4);
  
  exec ( "C:/xampp/htdocs/test/Progetto/NuovoNodo.py \"$n1\" \"$n2\" $n3 \"$n4\" $n5 \"$n6\" $n7 " );
  correctImageOrientation($uploaddir . $userfile_name);
}

else{
  //Se l'operazione è fallta...
  echo 'Upload NON valido!'; 
}
# 
?>


<html>
  <head>
   <meta http-equiv="refresh" content=" 0;url='Admin.php'" />
  </head>
</html>
