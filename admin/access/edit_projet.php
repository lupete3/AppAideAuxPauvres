<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$detail = $_POST['detail'];
	$id = $_POST['id'];
	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/blog/$im");


	if(!empty($titre) AND !empty($detail)){

		$req=$bd->prepare('UPDATE projet SET titre = ?,detail = ?, image = ? WHERE id = ?');

		if ($req->execute(array($titre,$detail,$im,$id))){

			header('location:../pages/listProjets.php?sms=2');
		}else{

			header('location:../pages/listProjets.php?sms=3');
		}
        
	}else{
		header('location:../pages/listProjets.php?sms=4');
	}
	}

	if (isset($_POST['delete'])) {

		$id = $_POST['id']; 

		$req=$bd->prepare('DELETE FROM projet WHERE id = ?');

		if ($req->execute(array($id))){

			header('location:../pages/listProjets.php');
		}else{

			header('location:../pages/listProjets.php');
		}
	}

?>