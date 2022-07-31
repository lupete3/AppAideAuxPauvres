<?php 
	include ('connex.php');

	if(isset($_POST['update'])){

	$titre = $_POST['titre'];
	$nom = $_POST['detail'];
	$id = $_POST['id'];

		if(!empty($nom) AND !empty($titre)   ){

			$req=$bd->prepare('UPDATE engagement SET titre = ?, detail = ? WHERE id = ?');

			if ($req->execute(array($titre,$nom,$id))){

				header('location:../pages/listEngagement.php?sms=2');
			}else{

				header('location:../pages/listEngagement.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listEngagement.php?sms=4');
		}
	}

	if(isset($_POST['delete'])){

		$id = $_POST['id'];

		if(!empty($id)){

			$req=$bd->prepare('DELETE FROM engagement WHERE id = ?');

			if ($req->execute(array($id))){

				header('location:../pages/listEngagement.php?sms=2');
			}else{

				header('location:../pages/listEngagement.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listEngagement.php?sms=4');
		}
	}

?>