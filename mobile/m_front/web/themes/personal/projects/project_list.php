<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = $title;
?>


<div class="innermenu_container innermenu_container_inner" >
    <div class="innermenu_left">
        <a href="#"><?= $slug1; ?> projects</a>
    </div>
    <div class="innermenu_right innermenu_right_project_type_list">
        <ul>
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => $slug1, 'slug2' => 'Commercial']); ?>">Commercial</a>
            </li>
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => $slug1, 'slug2' => 'Residential']); ?>">Residentail</a>
            </li>
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => $slug1]); ?>">View all</a>
            </li>
        </ul>
    </div>
    <div class="project_details_header_right project_type_list" style="display:none;">
        <div class="right_arrow">
            <img src="<?= $this->theme->baseUrl; ?>/images/arrow.png">
        </div>
        <ul class="projects_menu" style="display: none;">
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => $slug1, 'slug2' => 'Commercial']); ?>">Commercial</a>
            </li>
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => $slug1, 'slug2' => 'Residential']); ?>">Residentail</a>
            </li>
            <li class="hide_content">
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => $slug1]); ?>">View all</a>
            </li>
            <li>
                <a class="horizontal_line">&nbsp;</a>
            </li>
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Ongoing']); ?>">Ongoing</a>
            </li>
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Upcoming']); ?>">Upcoming</a>
            </li>
            <li>
                <a href="<?= Url::toRoute(['projects/view', 'slug1' => 'Completed']); ?>">Completed</a>
            </li>
        </ul>
    </div>
</div>







<div class="project_container">

    <?php
        if($slug2==''){
    
            if(!empty($data['products'])){
                foreach ($data['products'] as $key) {
    
                    echo '<div class="project_box">';
                        echo '<div class="projects" style="width: 221px;">';
                            echo '<h1 class="projects_name"><?= $key->title; ?></h1>';
                            echo '<span class="projects_location">Gulshan, Dhaka';
                            echo '</span>';
                            echo '<div class="project_thumb_container">';
                                echo '<img src="images/thumb-1.jpg">';
                            echo '</div>';
                            echo '<div class="project_exlpore_container">';
                                echo '<a href="http://dcastalia.com/projects/web/shanta2015/page2.html" class="project_explore">';
                                    echo '<img src="images/explore.png">';
                                echo '</a>';
                                echo '<span class="border-bottom">&nbsp;</span>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
    
                }
            }



            if(!empty($data['child_cat'])){
                foreach ($data['child_cat'] as $key) {
                    
                    if(isset($key['data'])){

                        if($key['data']['cat_title']=='Residential'){

                            if(!empty($key['products'])){
                                foreach ($key['products'] as $project) {
                                    /*echo '<pre>';
                                        var_dump($project->products);
                                    exit();*/
                                    
                                    echo '<div class="project_box">';
                                        
                                        echo '<div class="projects" style="width: 221px;">';    
                                            echo '<a href="'.Url::toRoute(['projects/projectview', 'cat1' => $slug1, 'cat2' => $key['data']['cat_title'], 'project' => $project->products->slug]).'">';
                                                echo '<h1 class="projects_name">'.$project->products->title.'</h1>';
                                                
                                                foreach ($project->products->specification as $spec) {
                                                    if($spec->item_name=='Location'){
                                                        echo '<span class="projects_location">'.$spec->item_val;
                                                    }
                                                }

                                                echo '</span>';
                                                echo '<div class="project_thumb_container">';
                                                    if(isset($project->products->image_by_banner)){
                                                        echo '<img src="'.\Yii::$app->urlManagerBackEnd->baseUrl.'/product_uploads/'.$project->products->image_by_banner->image.'">';
                                                    }
                                                    
                                                echo '</div>';
                                                echo '<div class="project_exlpore_container">';
                                                    //echo '<a href="'.Url::toRoute(['projects/projectview', 'cat1' => $slug1, 'cat2' => $key['data']['cat_title'], 'project' => $project->products->slug]).'" class="project_explore">';
                                                        echo '<div class="px-btn">EXPLORE</div>';
                                                    //echo '</a>';
                                                    echo '<span class="border-bottom">&nbsp;</span>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                        
                                    echo '</div>';
                    
                                }
                            }
                        }

                    }
                    
    
                }



                foreach ($data['child_cat'] as $key) {
                    
                    if(isset($key['data'])){

                        if($key['data']['cat_title']=='Commercial'){

                            if(!empty($key['products'])){
                                foreach ($key['products'] as $project) {
                
                                    echo '<div class="project_box">';
                                        echo '<div class="projects" style="width: 221px;">';
                                            echo '<a href="'.Url::toRoute(['projects/projectview', 'cat1' => $slug1, 'cat2' => $key['data']['cat_title'], 'project' => $project->products->slug]).'">';
                                                echo '<h1 class="projects_name">'.$project->products->title.'</h1>';
                                                
                                                foreach ($project->products->specification as $spec) {
                                                    if($spec->item_name=='Location'){
                                                        echo '<span class="projects_location">'.$spec->item_val;
                                                    }
                                                }

                                                echo '</span>';
                                                echo '<div class="project_thumb_container">';
                                                    if(isset($project->products->image_by_banner)){
                                                        echo '<img src="'.\Yii::$app->urlManagerBackEnd->baseUrl.'/product_uploads/'.$project->products->image_by_banner->image.'">';
                                                    }
                                                    
                                                echo '</div>';
                                                echo '<div class="project_exlpore_container">';
                                                    //echo '<a href="'.Url::toRoute(['projects/projectview', 'cat1' => $slug1, 'cat2' => $key['data']['cat_title'], 'project' => $project->products->slug]).'" class="project_explore">';
                                                        echo '<div class="px-btn">EXPLORE</div>';
                                                    //echo '</a>';
                                                    echo '<span class="border-bottom">&nbsp;</span>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    echo '</div>';
                    
                                }
                            }
                        }

                    }
                    
    
                }


            }

        }

        if($slug2!=''){
    
            if(!empty($data['products'])){
                foreach ($data['products'] as $key) {
    
                    echo '<div class="project_box">';
                        echo '<div class="projects" style="width: 221px;">';
                            echo '<h1 class="projects_name"><?= $key->title; ?></h1>';
                            echo '<span class="projects_location">Gulshan, Dhaka';
                            echo '</span>';
                            echo '<div class="project_thumb_container">';
                                echo '<img src="images/thumb-1.jpg">';
                            echo '</div>';
                            echo '<div class="project_exlpore_container">';
                                echo '<a href="http://dcastalia.com/projects/web/shanta2015/page2.html" class="project_explore">';
                                    echo '<div class="px-btn">EXPLORE</div>';
                                echo '</a>';
                                echo '<span class="border-bottom">&nbsp;</span>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
    
                }
            }



            if(!empty($data['child_cat'])){
                foreach ($data['child_cat'] as $key) {
                    
                    if(isset($key['data'])){

                        if($key['data']['cat_title']==$slug2){

                            if(!empty($key['products'])){
                                foreach ($key['products'] as $project) {
                                    /*echo '<pre>';
                                        var_dump($project->products);
                                    exit();*/
                                    echo '<div class="project_box">';
                                        echo '<div class="projects" style="width: 221px;">';
                                            echo '<a href="'.Url::toRoute(['projects/projectview', 'cat1' => $slug1, 'cat2' => $key['data']['cat_title'], 'project' => $project->products->slug]).'">';
                                                echo '<h1 class="projects_name">'.$project->products->title.'</h1>';
                                                
                                                foreach ($project->products->specification as $spec) {
                                                    if($spec->item_name=='Location'){
                                                        echo '<span class="projects_location">'.$spec->item_val;
                                                    }
                                                }

                                                echo '</span>';
                                                echo '<div class="project_thumb_container">';
                                                    if(isset($project->products->image_by_banner)){
                                                        echo '<img src="'.\Yii::$app->urlManagerBackEnd->baseUrl.'/product_uploads/'.$project->products->image_by_banner->image.'">';
                                                    }
                                                    
                                                echo '</div>';
                                                echo '<div class="project_exlpore_container">';
                                                    //echo '<a href="'.Url::toRoute(['projects/projectview', 'cat1' => $slug1, 'cat2' => $key['data']['cat_title'], 'project' => $project->products->slug]).'" class="project_explore">';
                                                        echo '<div class="px-btn">EXPLORE</div>';
                                                    //echo '</a>';
                                                    echo '<span class="border-bottom">&nbsp;</span>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    echo '</div>';
                    
                                }
                            }
                        }


                    }
                }
            }

        }
    ?>
    

</div>

<div class="landing_social_container">
    <div class="main-menu-social-container home_social">
        <a href="mailto:tropicalhomes1996@gmail.com"><i class="sprite sprite-email"></i></a>
        <a href="https://www.facebook.com/tropicalhomesltd"><i class="sprite sprite-fb"></i></a>
        <a href=""><i class="sprite sprite-twitter"></i></a>
        <a href=""><i class="sprite sprite-in"></i></a>
    </div>
</div>