<?php 
// Note: $image is an Imagick object, not a filename! See example use below. 
function autoRotateImage($image) { 
    $orientation = $image->getImageOrientation(); 

    switch($orientation) { 
        case imagick::ORIENTATION_BOTTOMRIGHT: 
            $image->rotateimage("#000", 180); // rotate 180 degrees 
        break; 

        case imagick::ORIENTATION_RIGHTTOP: 
            $image->rotateimage("#000", 90); // rotate 90 degrees CW 
        break; 

        case imagick::ORIENTATION_LEFTBOTTOM: 
            $image->rotateimage("#000", -90); // rotate 90 degrees CCW 
        break; 
    } 

    // Now that it's auto-rotated, make sure the EXIF data is correct in case the EXIF gets saved with the image! 
    $image->setImageOrientation(imagick::ORIENTATION_TOPLEFT); 
} 
?> 
<html>
  <head>
    
  </head>
	<body>
		<?php
			$image = new Imagick('IngressoPorta%20scorrevole.jpg');
			autoRotateImage($image);
			// - Do other stuff to the image here -
			$image->writeImage('result-image.jpg');
		?>
		<div id=\"imm\"><img class="responsive-img" src="img\IngressoPorta%20scorrevole.jpg" alt="immagine"></div>
	</body>
</html>
