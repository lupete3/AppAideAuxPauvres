<?php require_once ('admin/access/connex.php');

$titre = "Nous contacter";

 include('header.php'); 

 if (isset($_POST['send'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $objet = $_POST['objet'];
      $message = $_POST['message'];
      $statut = 'nouveau';

       $req=$bd->prepare('INSERT INTO email_box (nom,email,contact,objet,comment,statut) VALUES (?,?,?,?,?,?) ');
       if ($req->execute(array($name,$email,$phone,$objet,$message,$statut))) {
          header('location:contact.php?sms=2');
       }else header('location:contact.php');



   }

 ?>

<section id="inner-banner">
<div class="overlay">
<div class="container">
<div class="row"> 
<div class="col-sm-6"><h1>NOUS CONTACTER</h1></div>
<div class="col-sm-6">
  <h6 class="breadcrumb"><a href="index.php">Accueil</a> / Nous contacter</h6></div>
</div>
</div>
</div>
</section>

<div class="google-maps">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12789754.135904364!2d-103.6801893!3d38.4992109!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1502302011686" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<?php 
    $req=$bd->prepare('SELECT * FROM contact_company');
    $req->execute();
    $res = $req->fetch();
?>

<section id="about-sec">
<div class="container">
<div class="row text-center" style=" margin-top:-20px;">
<div class="col-md-4" style=" margin-top:20px;">
<div class="con-box">
<div class="fancy-box-icon">
<i class="fa fa-mobile-phone"></i>
</div>
<h3>PHONE</h3>
<div class="fancy-box-content">
<p><?php echo $res['phone']; ?></p>
</div>
</div>
</div>
<div class="col-md-4" style=" margin-top:20px;">
<div class="con-box" style="background:#2f3191;">
<div class="fancy-box-icon">
<i class="fa fa-map-marker"></i>
</div>
<h3>ADDRESS</h3>
<div class="fancy-box-content">
<p><?php echo $res['adresse']; ?></p>
</div>
</div>
</div>
<div class="col-md-4" style=" margin-top:20px;">
<div class="con-box">
<div class="fancy-box-icon">
<i class="fa fa-envelope-o"></i>
</div>
<h3>EMAIL</h3>
<div class="fancy-box-content">
<p><?php echo $res['email']; ?></p>
</div>
</div>
</div>
<div class="clearfix"></div>
<h2>SI VOUS AVEZ DES QUESTIONS<br>
VUEILLEZ NE PAS HESITER A NOUS ENVOYER UN MESSAGE.</h2>
	<form action="" method="post" accept-charset="utf-8">
		
		<div class="con-form clearfix">
			<div class="col-md-3">
				<input type="text" name="name" value="" size="40" class="" id="name" aria-required="true" aria-invalid="false" placeholder="Notre Nom*" required>
			</div>
			<div class="col-md-3">
				<input type="email" name="email" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Vote Adresse Email*" required>
			</div>
			<div class="col-md-3">
				<input type="phone" name="phone" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Votre Téléphone*" required>
			</div>
			<div class="col-md-3">
				<input type="text" name="objet" value="" size="40" class="" id="subject" aria-invalid="false" placeholder="Subject" >
			</div>
			<div class="col-md-12">
				<textarea name="message" required cols="40" rows="5" class="" id="message" aria-required="true" aria-invalid="false" placeholder="Message"></textarea>
			</div>
			<div class="col-xs-12 submit-button">
				<input type="submit" name="send" value="send message" class="btn2" id="sub" style="border:none; margin: 20px 0 0 0">
			</div>
			</div>
			</div>
		</div>
	</form>
</section>

<?php include('footer.php'); ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootsnav.js"></script>
<script src="js/banner.js"></script>  
<script src="js/script.js"></script>
</body>
</html>
