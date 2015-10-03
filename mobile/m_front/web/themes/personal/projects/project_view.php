<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = $title;
?>

<link rel="stylesheet" href="<?= $this->theme->baseUrl; ?>/css/jquery.fancybox.css" type="text/css"/>
<script type="text/javascript" src="<?= $this->theme->baseUrl; ?>/js/jquery.fancybox.js"></script>

<div class="project_details_header">
	<div class="project_details_header_left">
		<h1 class="projects_name"><?= $project_data->title; ?></h1>
		<span class="projects_location">
			<?php
				foreach ($project_data->specification as $spec) {
                    if($spec->item_name=='Location'){
                        echo '<span class="projects_location">'.$spec->item_val;
                    }
                }
			?>
		</span>
	</div>
	<div class="project_details_header_right">
		<div class="right_arrow">
			<img src="<?= $this->theme->baseUrl; ?>/images/arrow.png">
		</div>
		<ul class="projects_menu" style="display: none;">
			<li>
				<a href="#at_a_glance">At a glance</a>
			</li>
			<li>
				<a href="#location">Location Map</a>
			</li>
			<li>
				<a href="#features">Features</a>
			</li>
			<li>
				<a href="#gallery">Photo Gallery</a>
			</li>
			<li>
				<a href="#book">Book Now</a>
			</li>
			<li>
				<a href="#comment">Comment</a>
			</li>
		</ul>
	</div>
</div>


<div class="projects_details_container">
	<div class="projects_at_a_glance" id="overview">
		<h2>Overview</h2>
		
		<?php
			echo $project_data->desc;
		?>

	</div>

	<div class="projects_at_a_glance" id="floorplans">
		<h2>Floor Plans</h2>
		
		<?php
			$posts = $project_data->post;
			if(!empty($posts) && isset($posts[0])){
				echo $posts[0]->post_desc;
			}
		?>
	</div>

	<div class="projects_location_map_container" id="location">
		<h2 style="font-size:18px;">Location Map</h2>
		<?php
			$posts = $project_data->post;
			if(!empty($posts) && isset($posts[1])){
				echo $posts[1]->post_desc;
			}
		?>
	</div>


	<div class="projects_photo_gallery" id="Gallery">
		<h2>Gallery</h2>
		<div class="photo_gallery_container">
				
			<?php
				$i = 0;
				if(!empty($project_data->image_all)){
					foreach ($project_data->image_all as $images) {
						echo '<div class="photos" data_id="'.$i.'" style="width: 175px;">';
							echo '<a class="fancybox" rel="fancybox-button" href="'.\Yii::$app->urlManagerBackEnd->baseUrl.'/product_uploads/'.$images->image.'">';
								echo '<img src="'.\Yii::$app->urlManagerBackEnd->baseUrl.'/product_uploads/thumb/'.$images->image.'">';
							echo '</a>';
						echo '</div>';
						$i++;
					}
				}
			?>

		</div>
		
	</div>
	

	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
				caption : {
						type : 'inside'
					},
					openEffect  : 'elastic',
					closeEffect : 'elastic',
					nextEffect  : 'elastic',
					prevEffect  : 'elastic',
					padding : 0
			});
		});

		$(window).resize(function(){
			$.fancybox.update();
		});

	</script>

</div>
<div class="landing_social_container">
	<div class="main-menu-social-container home_social">
		<a href="mailto:tropicalhomes1996@gmail.com"><i class="sprite sprite-email"></i></a>
		<a href="https://www.facebook.com/tropicalhomesltd"><i class="sprite sprite-fb"></i></a>
		<a href=""><i class="sprite sprite-twitter"></i></a>
		<a href=""><i class="sprite sprite-in"></i></a>
	</div>
</div>