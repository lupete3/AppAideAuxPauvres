<?php require_once ('admin/access/connex.php');

$titre = "Nos Projets";

 include('header.php'); ?>

<section id="inner-banner">
<div class="overlay">
<div class="container">
<div class="row"> 
<div class="col-sm-6"><h1>PROJECTS</h1></div>
<div class="col-sm-6">
  <h6 class="breadcrumb"><a href="index.php">Accueil</a> / Projets</h6></div>
</div>
</div>
</div>
</section>

<section id="pro-sec">
	<div class="container">
		<div class="row text-center" style="margin-top:-30px;">

			<?php 
			   $req=$bd->prepare('SELECT * FROM projet');
			   $req->execute();
			   while($res = $req->fetch()){
			?>
			<div class="col-sm-6 col-md-4 clearfix top-off">
				<div class="grid-image"><img src="images/<?php echo $res['image'] ?>"></div>
				<div class="post-content">
					<h3><?php echo $res['titre'] ?></h3>
					<hr>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="donate.html" title="" >Se joindre à nous</a>
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
