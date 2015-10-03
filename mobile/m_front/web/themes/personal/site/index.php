<?php

use yii\helpers\Url;

$this->title = 'ANZ Properties';
?>

<link href="<?= $this->theme->baseUrl; ?>/css/slick.css" rel="stylesheet" />
<script type='text/javascript' src="<?= $this->theme->baseUrl; ?>/js/slick.min.js"></script> 

<link href="<?= $this->theme->baseUrl; ?>/css/jquery.bxslider.css" rel="stylesheet" />
<script type='text/javascript' src="<?= $this->theme->baseUrl; ?>/js/jquery.bxslider.min.js"></script> 


<script type='text/javascript' src="<?= $this->theme->baseUrl; ?>/js/jquery.min.js"></script> 
<script type='text/javascript' src="<?= $this->theme->baseUrl; ?>/js/jquery.easing.1.3.js"></script>
<script type='text/javascript' src="<?= $this->theme->baseUrl; ?>/js/camera.js"></script> 


<script>
	jQuery(function(){
		
		jQuery('#landing_slider').camera({
			thumbnails: false,
			pagination: false,
			playPause:false,
			navigation:false,
			fx:'simpleFade'
		});

	});

	
</script>


<div class="landingpage_container">
	<div class="camera_wrap camera_azure_skin" id="landing_slider">

		<?php

			foreach ($data_q as $key) {
				echo '<div data-src="'.\Yii::$app->urlManagerBackEnd->baseUrl.'/slider_images/'.$key->image.'"></div>';
			}

		?>

	</div>
</div>




<div class="landing_footer_container">
	<div class="landing_footermenu">
		<ul>




			<li>

				<a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Ongoing']); ?>">
					<div class="menuContainer">

					<span class="ongoing">
						<i class="sprite sprite-ongoing"></i>
					</span>
					<span class="menu_title">
						Ongoing
					</span>
					</div>
				</a>
			</li>



			<li>
				<a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Upcoming']); ?>">
                    <div>

						<div class="menuContainer">

					<span class="complete">
						<i class="sprite sprite-complete"></i>
					</span>
					<span class="menu_title">
						Upcoming
					</span>
						</div>
				</a>
			</li>
			<li>
				<a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Completed']); ?>">
					<div class="menuContainer">
					<span class="upcoming">
						<i class="sprite sprite-up-coming"></i>
					</span>
					<span class="menu_title">
						Completed
					</span>
						</div>
				</a>
			</li>
		</ul>
	</div>
</div>



<div class="landing_social_container">
	<div class="main-menu-social-container home_social">
		<a href="mailto:tropicalhomes1996@gmail.com"><i class="sprite sprite-email"></i></a>
		<a href="https://www.facebook.com/tropicalhomesltd"><i class="sprite sprite-fb"></i></a>
		<a href=""><i class="sprite sprite-twitter"></i></a>
		<a href=""><i class="sprite sprite-in"></i></a>
	</div>
</div>

