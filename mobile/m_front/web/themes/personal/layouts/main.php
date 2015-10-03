<?php
use yii\helpers\Html;
use yii\helpers\Url;
use m_front\models\Page;
use m_front\models\MenuPageRels;
use m_front\models\Slider;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>

    <link rel="icon"  href="<?= $this->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' id='camera-css'  href='<?= $this->theme->baseUrl; ?>/css/camera.css' type='text/css' media='all'>
	<link rel="stylesheet" type="text/css" href="<?= $this->theme->baseUrl; ?>/css/sprite.css">
	<link rel="stylesheet" type="text/css" href="<?= $this->theme->baseUrl; ?>/css/sprite2.css">
	<link rel="stylesheet" type="text/css" href="<?= $this->theme->baseUrl; ?>/css/style.css">
	<script type="text/javascript" src="<?= $this->theme->baseUrl; ?>/js/jquery-1.10.2.js"></script>

<script type="text/javascript" src="<?= $this->theme->baseUrl; ?>/js/jquery.event.move.js"></script>
<script type="text/javascript" src="<?= $this->theme->baseUrl; ?>/js/jquery.event.swipe.js"></script>

    <?php $this->head() ?>
    
    	 <script src="//cdn.jsdelivr.net/mobile-detect.js/0.4.3/mobile-detect.min.js"></script>
	 <script type="text/javascript">
	  var isMobile = {
	        Android: function() {
	            return navigator.userAgent.match(/Android/i);
	        },
	        BlackBerry: function() {
	            return navigator.userAgent.match(/BlackBerry/i);
	        },
	        iOS: function() {
	            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	        },
	        Opera: function() {
	            return navigator.userAgent.match(/Opera Mini/i);
	        },
	        Windows: function() {
	            return navigator.userAgent.match(/IEMobile/i);
	        },
	        any: function() {
	            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	        }
	    };
	
	    if( isMobile.any() ){
	        //window.location.assign("http://shantaholdings.com/mobile");
	    }else{
		   $(window).resize(function(){
	    		var win_width = parseInt($(window).width());
	
	    		if(win_width>800){
	    			$('.redirect_cont_back').fadeIn('slow');
	    			$('.redirect_cont').fadeIn('slow');
	    			var url = window.location.href;
	
	    			setTimeout(function(){
	    				window.location = url.replace('/mobile/','/#/');
	    			},3000);
	
	    		}
	    	});
	    }
	 </script>

    
</head>
<body>


    <div class="loader" style="display:none;"><div class="loader_box"></div></div>

    <div class="redirect_cont_back" style="display:none;"></div>
    <div class="redirect_cont" style="display:none;">
    	<p>Please wait while you are being redirected to desktop version...</p>
    </div>


    <div class="container_bg container_bg_search"></div>
    <div class="container">
    	
		<div class="header_container">

			<div class="logo_container">
				<a href="<?= Url::home(); ?>"><img src="<?= $this->theme->baseUrl; ?>/images/logo.png"></a>
			</div>

			<div class="mobilemenu_container">
				<img src="<?= $this->theme->baseUrl; ?>/images/menu.png">
				<div class="search_btn_top"><a href="<?= Url::toRoute(['site/search']); ?>"></a></div>
				
			</div>

			<div class="menu_section">
				
				<div class="menu_logo_cross_container">
					<div class="menu_logo">
						<a href="<?= Url::home(); ?>"><img src="<?= $this->theme->baseUrl; ?>/images/logo.png"></a>
					</div>
					<div class="menu_cross">
						<img src="<?= $this->theme->baseUrl; ?>/images/cross.png">
						<div class="search_btn_top search_overlayer"><a href="<?= Url::toRoute(['site/search']); ?>"></a></div>
					</div>
					
				</div>



                <div class="main_menu_footer_menu">
                    <ul>
                        <li>
                            <a class="footer_header" href="<?= Url::toRoute(['page/view', 'slug1' => 'about-us']); ?>">About us</a>

                            <!--                           <ul>-->
                            <!---->
                            <!--                               <li><a href="#">CSR ACTIVITIES</a></li>-->
                            <!--                               <li><a href="#">THE LOGO-->
                            <!--                                   </a></li>-->
                            <!--                               <li><a href="#">SERVICES</a></li>-->
                            <!--                               <li><a href="#">MISSION & VISION-->
                            <!--                                   </a></li>-->
                            <!--                               <li><a href="#">BACKGROUND</a></li>-->
                            <!--                               <li><a href="#"></a></li>-->
                            <!--                           </ul>-->

                        </li>

                        <?php
                        $menu_items = MenuPageRels::getHierarchy_page(8);
                        echo $menu_items;
                        ?>

                    </ul>
                    <ul>
                        <li>
                            <a class="footer_header" href="<?= Url::toRoute(['page/view', 'slug1' => 'career']); ?>">Company</a>
                        </li>
                        <?php
                        $menu_items = MenuPageRels::getHierarchy_page(9);
                        echo $menu_items;
                        ?>
                    </ul>
                    <ul>
                        <li>
                            <a class="footer_header" href="<?= Url::toRoute(['page/view', 'slug1' => 'history']); ?>">Messages</a>
                        </li>
                        <?php
                        $menu_items = MenuPageRels::getHierarchy_page(10);
                        echo $menu_items;
                        ?>
                    </ul>
                    <!--<ul>
                        <li>
                            <a class="footer_header" href="<?= Url::toRoute(['page/view', 'slug1' => 'landowners']); ?>">Landowners</a>
                        </li>
                        <?php
                        $menu_items = MenuPageRels::getHierarchy_page(11);
                        echo $menu_items;
                        ?>
                    </ul>-->

                    <ul>
                        <li>
                            <a class="footer_header" href="<?= Url::toRoute(['page/view', 'slug1' => 'contact-us']); ?>">Contact us</a>
                        </li>
                        <?php
                        $menu_items = MenuPageRels::getHierarchy_page(12);
                        echo $menu_items;
                        ?>
                    </ul>


                </div>


				<div class="main_menu_container">
					<div class="landing_footermenu">
						<ul>
							<li>
								<a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Ongoing']); ?>">
									<span class="ongoing">
										<i class="sprite sprite-ongoing"></i>
									</span>
									<span class="menu_title">
										Ongoing
									</span>
								</a>
							</li>
							<li>
								<a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Upcoming']); ?>">
									<span class="complete">
										<i class="sprite sprite-complete"></i>
									</span>
									<span class="menu_title">
										Upcoming
									</span>
								</a>
							</li>
							<li>
								<a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Completed']); ?>">
									<span class="upcoming">
										<i class="sprite sprite-up-coming"></i>
									</span>
									<span class="menu_title">
										Completed
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>



				<div class="main_menu-social-search-container">
					<div class="main-menu-social-container main-menu-social-container_top">
						<a href="mailto:tropicalhomes1996@gmail.com"><i class="sprite sprite-email"></i></a>
						<a href="https://www.facebook.com/tropicalhomesltd"><i class="sprite sprite-fb"></i></a>
						<a href=""><i class="sprite sprite-twitter"></i></a>
						<a href=""><i class="sprite sprite-in"></i></a>
					</div>
				</div>


				<div class="main-menu-copyright-developer-container">
					<div class="main-menu-copyright-container">
						&copy; 2015.anz properties ltd. all rights reserved.
					</div>
					<div class="main-menu-developer-container">
						design &amp; developement by <a target="_blank" href="http://www.dcastalia.com">dcastalia</a>
					</div>
				</div>
			</div>
		</div>

		<?= $content ?>

		<div class="footer_container" style="">
			<div class="footer_left">
				&copy; 2015.anz properties ltd. all rights reserved.
			</div>
			<div class="footer_right">
				design &amp; developement by <a target="_blank" href="http://www.dcastalia.com">dcastalia</a>
			</div>
		</div>
	
</div>
    


    <script>
		$( document ).ready(function() {
			resize_function();
			$( window ).resize(function() {
				resize_function();
			});

			function resize_function(){
				var window_height = $( window ).height();
				var window_width = $( window ).width();

				/*if(window_width>800){
					window.location.href = "http://dcastalia.com/projects/web/spl_new";
				}*/
				var footer_height = parseInt($('.footer_container').css('height'));

				//$('.container_bg').css({'height':window_height-footer_height});

				
				var innermenu_container_width = window_width;
				$('.innermenu_container').css({width:innermenu_container_width});
				$('.innermenu_container_inner').css({width:innermenu_container_width-40});

				var projects_width = $( '.project_box' ).width();
				$('.projects').css({width:projects_width - 41});

                var max_height = 0;
				$('.projects_location').css('height','auto');
				$('.projects_location').each(function(key,value){
					if(parseInt($(value).css('height'))>max_height){
						max_height = parseInt($(value).css('height'));
						console.log(max_height);
					}
				});
				$('.projects_location').css('height',max_height);

				var max_height2 = 0;
				$('.projects_name').css('height','auto');
				$('.projects_name').each(function(key,value){
					if(parseInt($(value).css('height'))>max_height2){
						max_height2 = parseInt($(value).css('height'));
						
					}
				});
				$('.projects_name').css('height',max_height2);

				var photos_width = (window_width - 100) / 4;
				$('.photos').css({width:photos_width});
				$('.photos').css({height:(photos_width/1.98)});

				$( ".mobilemenu_container img" ).click(function() {
				  	$('.menu_section').css({'display':'block'});
				  	$('body').css({'overflow':'visible'})
				});

				$( ".menu_cross img" ).click(function() {
				  	$('.menu_section').css({'display':'none'});
				  	$('body').css({'overflow':'hidden'})
				});
				
				$( ".right_arrow img" ).click(function() {
				  $( ".projects_menu" ).toggle();
				});

				$('.common_details_container p').css('width',(window_width-40)+'px');
				$('.common_details_container h3').css('width',(window_width-40)+'px');
				$('.error_cont ul li').css('width',(window_width-40)+'px');
				$('.write_comments_container a').css('width',(window_width-40)+'px');
				$('.view_comments_container a').css('width',(window_width-40)+'px');
				$('.landing_writeus_container a').css('width',(window_width-40)+'px');
				$('.landing_phone p').css('width',(window_width-40)+'px');
				//$('.landing_footer_container').css('width',((parseInt($(window).width()))-40)+'px');

				$('.projects_at_a_glance').css('width',(window_width-40)+'px');
				$('.projects_booknow').css('width',(window_width-40)+'px');
				$('.photo_gallery_container').css('width',(window_width-40)+'px');


			}



			$('.view_comment').on('click',function(){
				$('.comments_container').slideToggle();
				$('.view_comment').toggle();
				$('.close_comment').toggle();
				return false;
			});

			$('.close_comment').on('click',function(){
				$('.comments_container').slideToggle();
				$('.view_comment').toggle();
				$('.close_comment').toggle();
				return false;
			});

			$('.write_comment').on('click',function(){
				$('.write_comment_cont').slideToggle();
				return false;
			});
			
		});



		$(document).bind("ajaxSend", function(){
		   $('.loader').show();
		}).bind("ajaxComplete", function(){
		   $('.loader').hide();
		});


		$('.main-menu-search-container').on('click',function(){
			var url = $('.search_frm').attr('action');
			window.location = url;
		});

		$('.projects_location_map img').on('click',function(){
			var link = $(this).attr('src');
			window.open(link,'_blank');
		});

	</script>


</body>
</html>
<?php $this->endPage() ?>
