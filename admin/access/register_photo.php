<?php 
	include ('connex.php');

	if(isset($_POST['save'])){
	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/galerie/$im");


		$req=$bd->prepare('INSERT INTO galerie(image) VALUES (?)');

		if ($req->execute(array($im))){

			header('location:../pages/gGalerie.php?sms=2');
		}else{

			header('location:../pages/gGalerie.php?sms=3');
		}
        
	
}

?>