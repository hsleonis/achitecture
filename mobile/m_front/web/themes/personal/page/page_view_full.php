<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = $title;

?>


<div class="project_details_header">
    <div class="project_details_header_left">
        <h1 class="projects_name line-height">
            <?php
                if(isset($parent_title_q)){
                    echo $parent_title_q->page_title;
                }
            ?>
        </h1>
    </div>
    <div class="project_details_header_right">
        <div class="right_arrow">
            <img src="<?= $this->theme->baseUrl; ?>/images/arrow.png">
        </div>
        <ul class="projects_menu" style="display: none;">
            <?php
                if(isset($child_pages)){
                    foreach ($child_pages as $key) {
                        echo '<li>';
                            echo '<a href="#'.$key->page_slug.'">'.$key->page_title.'</a>';
                        echo '</li>';
                    }
                }
            ?>
        </ul>
    </div>


</div>



<?php
    
    if(!empty($child_pages)){
        foreach ($child_pages as $key) {
          
?>

    <div class="common_details_container" id="<?= $key->page_slug; ?>">
        <h2><?= $key->page_title; ?></h2>
        <?php
            if($key->page_desc!=''){
        ?>
            <div class="common_box">
                <?= $key->page_desc; ?>
            </div>
        <?php
            }
        ?>

        <hr class="pageHr">

    </div>



    <?php
        if($key->page_slug=='contact-form'){
    ?>
        <!-- <p>&nbsp;</p> -->
        
        <?php

            if(Yii::$app->session->hasFlash('error')){
                echo '<div class="error_cont">';
                    echo Yii::$app->session->getFlash('error');
                echo '</div>';
            }

        ?>
        
        <div class="projects_booknow">

            <form enctype="multipart/form-data" method="POST" id="apply_form" name="apply_form" action="<?= Url::toRoute(['page/apply_online']); ?>">
                <div class="text-title">
                    Please share you interests, comments and feedback with us to serve you 
                    with better services 
                </div>

                <h3>Contact Us</h3>
                <p>
                    <label for="name">NAME</label>
    				<input id="name" type="text" name="name">
                </p>

                <p>
                    <label for="cemail">EMAIL ADDRESS</label>
                    <input id="cemail" type="email" name="email">
				</p>

                <p>
                    <label for="mnumber">MOBILE NUMBER</label>
                    <input id="mnumber" type="text" name="mnumber">
                </p>

                <p>
                    <label for="interest">INTERESTED IN</label>
                    <select id="interest">
                        <option value=""></option>
                        <option value="">xXx1</option>
                        <option value="">xXx2</option>
                        <option value="">xXx3</option>
                        <option value="">xXx4</option>
                        <option value="">xXx5</option>
                    </select>
                </p>


                <p>
                    <label for="interest">MESSAGE</label>
                    <textarea id="interest" name="mnumber"></textarea>
                </p>

                <p>
                    <input type="submit" value="SEND">
                </p>
				

                <?php

                    if(Yii::$app->session->hasFlash('success')){
                        echo '<p>'.Yii::$app->session->getFlash('success').'</p>';
                    }

                ?>
            </form>


            <script type="text/javascript">
            $('#upload_file').on('change',function(){
                $('.selected_file').html($(this).val());
            });
            </script>

            
        </div>



    <?php
        }
    ?>




    

<?php
        }
    }
?>
<div class="landing_social_container">
    <div class="main-menu-social-container home_social">
        <a href="mailto:tropicalhomes1996@gmail.com"><i class="sprite sprite-email"></i></a>
        <a href="https://www.facebook.com/tropicalhomesltd"><i class="sprite sprite-fb"></i></a>
        <a href=""><i class="sprite sprite-twitter"></i></a>
        <a href=""><i class="sprite sprite-in"></i></a>
    </div>
</div>
WEWXWD

<script type="text/javascript">
    if($('.error_cont').length>0){
        var position = $('.error_cont').position();
        $("html, body").animate({ scrollTop: position.top }, 1000);
    }
</script>