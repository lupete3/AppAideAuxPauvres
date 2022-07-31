<?php require_once ('admin/access/connex.php'); 

$titre = "Notre Galerie photo";

include('header.php'); ?>

<section id="inner-banner">
	<div class="overlay">
		<div class="container">
			<div class="row"> 
				<div class="col-sm-6"><h1>GALLERY</h1></div>
				<div class="col-sm-6">
				  <h6 class="breadcrumb"><a href="index.php">Accueil</a> / Gallery</h6></div>
				</div>
		</div>
	</div>
</section>

<section id="gallery-sec" style="margin-top:40px;">
	<div class="container">
		<ul class="clearfix">
			<?php 
         $req2=$bd->prepare('SELECT * FROM galerie ORDER BY id DESC LIMIT 0,8');
         $req2->execute();
         while($res2 = $req2->fetch()){
      ?>
			<li>
				<a href="images/galerie/<?php echo $res2['image'] ?>" class="swipebox" title="Afficher">
					<div class="image">
						<img src="images/galerie/<?php echo $res2['image'] ?>">
						<div class="overlay"><i class="fa fa-search-plus"></i></div>
					</div>
				</a>
			</li>
			<?php } ?>
			</ul>
	</div>
</section>


<?php include('footer.php'); ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootsnav.js"></script>
<script src="js/banner.js"></script>
<script src="js/jquery.swipebox.js"></script>
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

      });
	</script>  
    <script src="js/script.js"></script>
</body>
</html>
