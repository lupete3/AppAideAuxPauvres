<?php require_once ('admin/access/connex.php');

	$titre = "A propos de nous";

 include('header.php'); ?>

<section id="inner-banner">
<div class="overlay">
<div class="container">
<div class="row"> 
<div class="col-sm-6"><h1>A PROPOS DE NOUS</h1></div>
<div class="col-sm-6">
  <h6 class="breadcrumb"><a href="index.html">Accueil</a> / A propos de nous</h6></div>
</div>
</div>
</div>
</section>

<?php 
    $req=$bd->prepare('SELECT * FROM apropos');
    $req->execute();
    $res = $req->fetch();
?>
<section id="about-sec">
<div class="container">
<div class="row text-justify">
<h1 class="text-center">A PROPOS DE FADAF</h1>
<hr>
<h5> <?php echo $res['titre'] ?></h5>
			<p><?php echo $res['detail']; ?> </p>

<div class="text-center">
</div>
</div>
</div>
</section>

<section id="activities-sec">
	<div class="container">
		<div class="row text-center">
			<h1>Ce que nous faisons</h1>
			<hr>
			<h5>Le FADAF interviendra dans plusieurs secteurs qui touchent au développement de l’Afrique</h5>
			<div class="text-left"> 
				<?php 
                    $req2=$bd->prepare('SELECT * FROM service');
                    $req2->execute();
                    while($res2 = $req2->fetch()){
                 ?>
				<div class="col-md-4 clearfix top-off">
					<div class="grid-content-left"><i class="fa fa-dashboard"></i></div>
					<div class="grid-content-wrapper"><h4><?php echo $res2['titre'] ?></h4><p><?php echo $res2['detail'] ?></p>
					<a href="activities.html" title="" >En savoir plus</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section id="team">
	<div class="container">
		<div class="row text-center">
			<h1>NOTRE EQUIPE</h1>
			<hr>
			<h5>FADAF vise le développement économique local, voici le staff technique </h5>
			<?php 
        $req2=$bd->prepare('SELECT * FROM equipe');
        $req2->execute();
        while($res2 = $req2->fetch()){
      ?>
			<div class="member col-xs-6 col-md-3">
				<div class="inner">
					<div class="avatar-inner"><img src="images/team/<?php echo $res2['image'] ?>"></div>
					<div class="info">
						<div class="name"><a href="#"> <?php echo $res2['nom'] ?> </a></div>
						<div class="regency"><?php echo $res2['fonction'] ?></div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootsnav.js"></script>
<script src="js/banner.js"></script>  
<script src="js/script.js"></script>
</body>
</html>
