<?php require_once ('admin/access/connex.php');

$titre = "Fadaf";

if (isset($_POST['save'])) {
     
     $email = $_POST['email'];

     $req=$bd->prepare("INSERT INTO subscribe(email) VALUES (?)");
     if ($req->execute(array($email))) {

        header('location:index.php?sms=1');
     }else header('location:index.php?sms=2');


  }

  if (isset($_POST['save1'])) {

       $name = $_POST['name'];
       $email = $_POST['email'];

       $req=$bd->prepare("INSERT INTO subscribe(nom,email) VALUES (?,?)");
        if ($req->execute(array($name,$email))) {

           header('location:index.php?sms=1');
        }else header('location:index.php?sms=2');

  }

 include('header.php'); ?>

<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- Item 1 -->
            <div class="item active slide1">
                        <h2 data-animation="animated bounceInDown"><span>Fadaf Incubateur</span></h2>
                        <h3 data-animation="animated bounceInDown">Intervenir comme incubateur en vue d’accompagner les jeunes entrepreneurs dans le but de Développer de nouvelles méthodes de recherches basées sur la lutte contre la pauvreté </h3>
                        <h4 data-animation="animated bounceInUp"><a href="about.php">En Savoir Plus</a></h4>             
             </div> 
            <!-- Item 2 -->
            <div class="item slide2">
                        <h2 data-animation="animated bounceInDown"><span>Harmonisation économique </span></h2>
                        <h3 data-animation="animated bounceInDown">Le FADAF va lener un plaidoyer pour l’harmonisation du secteur économique en vue de faciliter des investissements, Fournir ou négocier une assistance financière à ses membres qui ont des projets d’importance</h3>
                        <h4 data-animation="animated bounceInUp"><a href="about.php">En Savoir Plus</a></h4>             
             </div>
            <!-- Item 3 -->
            <div class="item slide3">
                        <h2 data-animation="animated bounceInDown"><span>Projets de développement</span></h2>
                        <h3 data-animation="animated bounceInDown">Fadaf sera en train d'organiser des activités scientifiques de réflexion sur les problèmes sociaux, économiques et de développement durables et Servir de cadres de concertation pour la promotion de la jeunesse</h3>
                        <h4 data-animation="animated bounceInUp"><a href="about.php">En Savoir Plus</a></h4>             
             </div>
            <!-- Item 4 -->
            <div class="item slide4">
                        <h2 data-animation="animated bounceInDown"><span>Activités de consultance </span></h2>
                        <h3 data-animation="animated bounceInDown">Fadaf intervien dans les domaines de finances, construction, agriculture, pèche, élevage, commerce, vente, livraison, logistique, informatique, maintenance</h3>
                        <h4 data-animation="animated bounceInUp"><a href="about.php">En Savoir Plus</a></h4>             
             </div>
            <!-- End Item 4 -->
    
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Précédent</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Suivant</span>
        </a>
    </div>
</div>


<?php 
    $req=$bd->prepare('SELECT * FROM apropos');
    $req->execute();
    $res = $req->fetch();
?>
<section id="about-sec">
	<div class="container">
		<div class="row text-center">
			<h1>A propos de FADAF</h1>
			<hr>

			<h5> <?php echo $res['titre'] ?></h5>
			<p><?php echo substr($res['detail'], 0,1100).'.'; ?> </p>
			<div class="text-center">
				<a href="contact.php" class="btn1">Nous Contacter</a>
				<a href="about.php" class="btn2">En Savoir Plus</a>
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
					<a href="projets.php" title="" >En savoir plus</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section id="video-sec">
	<div class="container">
		<div class="row text-center">
			<h1>Ce que nous offrons?</h1>
			<hr>
			<h5>Le CERCAF vise le développement économique local par le renforcement du Secteur Privé et de la Société Civile,à travers une recherche motivée, efficace et engagée dans le combat pour la lutte contre la pauvreté.</h5>
			<div class="text-left"> 
			<div class="col-md-6 clearfix top-off">
				<video width="400" controls>
				 	<source src="images/mov_bbb.mp4" type="video/mp4">
				</video>
			</div>
			<div class="col-md-6 clearfix top-off">
				<?php 
                    $req2=$bd->prepare('SELECT * FROM engagement');
                    $req2->execute();
                    while($res2 = $req2->fetch()){
                 ?>
				<div class="media">
					<div class="media-image">
						<img src="images/g2.png" class="attachment-full size-full" alt="g1">
					</div>
			
					<div class="media-text">
						<h5><?php echo $res2['titre'] ?></h5>
						<p><?php echo $res2['detail'] ?></p>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section id="projects-sec">
	<div class="container">
		<div class="row text-center">
			<h1>NOS PROJETS</h1>
			<hr>
			<h5>Pour promouvoir l’auto promotion de l’artisanat, l’entreprenariat et assurer la promotion de l’Education financière des acteurs économiques
			.</h5>
			<div class="text-center"> 
				<?php 
                    $req2=$bd->prepare('SELECT * FROM projet ORDER BY datePub DESC LIMIT 0,3');
                    $req2->execute();
                    while($res2 = $req2->fetch()){
                 ?>
				<div class="col-md-4 clearfix top-off">
					<div class="grid-image"><img src="images/test1.jpg"></div>
					<div class="post-content">
						<h3 ><?php echo $res2['titre'] ?></h3>
						<hr>
						
						<a href="projects.php" title="" >Voir le projet</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section id="gallery-sec">
	<div class="container">
		<div class="row text-center">
			<h1>NOTRE GALERIE</h1>
			<hr>
			<h5>Dans la lutte contre l’esprit de mendicité dans le chef de plusieurs africains qui n’attendent que ce que la société donne au lieu de servir.</h5>
			<ul class="clearfix">
			<?php 
                    $req2=$bd->prepare('SELECT * FROM galerie ORDER BY id DESC LIMIT 0,8');
                    $req2->execute();
                    while($res2 = $req2->fetch()){
                 ?>
			<li>
				<a href="images/galerie/<?php echo $res2['image'] ?>" class="swipebox" title="Voir">
					<div class="image">
						<img src="images/galerie/<?php echo $res2['image'] ?>">
						<div class="overlay"><i class="fa fa-search-plus"></i></div>
					</div>
				</a>
			</li>
			<?php } ?>
			</ul>
			<div class="text-center">
			<a href="gallery.php" class="btn1">Voir Plus</a>
			</div>
		</div>
	</div>
</section>
<section id="about-sec">
	<div class="container">
		<div class="row text-center">
			<h1>NOS PARTENAIRES</h1>
			<hr>
			<div id="owl-demo" class="owl-carousel owl-theme">
          		<?php 
                    $req2=$bd->prepare('SELECT * FROM partenaire ');
                    $req2->execute();
                    while($res2 = $req2->fetch()){
                 ?>
				<div class="item">
					<div class="sponser-box">
						<img src="images/sponsors/<?php echo $res2['image'] ?>" height="100" alt="<?php echo $res2['entreprise'] ?>">
						
					</div>
					
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootsnav.js"></script>
<script src="js/banner.js"></script>  
<script src="js/jquery.swipebox.js"></script>
<script src="js/owl.carousel.js"></script>
<script type="text/javascript">

	$( document ).ready(function() {

			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
			
			/* Video */
			$( '.swipebox-video' ).swipebox();

			/* Dynamic Gallery */
			$( '#gallery' ).click( function( e ) {
				e.preventDefault();
				$.swipebox( [
					{ href : 'http://swipebox.csag.co/mages/image-1.jpg', title : 'My Caption' },
					{ href : 'http://swipebox.csag.co/images/image-2.jpg', title : 'My Second Caption' }
				] );
			} );
			$("#owl-demo").owlCarousel({
 
      autoPlay: 5000, //Set AutoPlay to 3 seconds
	  navigation : true,
      navigationText:["",""],
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });

      });
</script>
<script src="js/script.js"></script>
</body>
</html>
