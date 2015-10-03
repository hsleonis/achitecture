<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Checking Requirements';
?>
<style type="text/css">
    .alert{
        display: none;
    }
    .loader{
        background-position: left;
        min-height: 65px;
    }
    .action{
        display: none;
    }
    .box_slide_down{
        display: none;
    }
</style>
<div class="site-index">


    <div class="col-md-12">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 box_slide_down" style="background:#fff;">
                <div class="box dark full-screen-box">
                    <header>
                        <div class="icons">
                          <i class="fa fa-edit"></i>
                        </div>
                        <h5>Checking Requirements</h5>

                        <!-- .toolbar -->
                        <div class="toolbar">
                          <nav style="padding: 8px;">
                            <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                              <i class="fa fa-minus"></i>
                            </a> 
                            <a href="javascript:;" class="btn btn-default btn-xs full-box">
                              <i class="fa fa-expand fa-compress"></i>
                            </a> 
                            <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                              <i class="fa fa-times"></i>
                            </a> 
                          </nav>
                        </div><!-- /.toolbar -->
                    </header>
                    <div style="" aria-expanded="true" id="div-1" class="body full-screen-box collapse in">

                        <div class="tags-form">

                            <?php
                                $flag = 0;

                                if(version_compare(PHP_VERSION, '5.4.0', '>=')){
                                    echo '<div role="alert" class="alert alert-success item1">';
                                      echo '<strong>Php version!&nbsp;&nbsp;&nbsp;</strong> Successfull. Your Php version is '.PHP_VERSION;
                                    echo '</div>';
                                }else{
                                    echo '<div role="alert" class="alert alert-danger item1">';
                                      echo '<strong>Php version!&nbsp;&nbsp;&nbsp;</strong> Unsuccessfull. Your Php version is '.PHP_VERSION;
                                    echo '</div>';
                                    $flag = 1;
                                }

                                if(class_exists('Reflection', false)){
                                    echo '<div role="alert" class="alert alert-success item2">';
                                      echo '<strong>Reflection extension!&nbsp;&nbsp;&nbsp;</strong> Successfull.';
                                    echo '</div>';
                                }else{
                                    echo '<div role="alert" class="alert alert-danger item2">';
                                      echo '<strong>Reflection extension!&nbsp;&nbsp;&nbsp;</strong> Unsuccessfull.';
                                    echo '</div>';
                                    $flag = 1;
                                }

                                if(extension_loaded('pcre')){
                                    echo '<div role="alert" class="alert alert-success item3">';
                                      echo '<strong>PCRE extension!&nbsp;&nbsp;&nbsp;</strong> Successfull.';
                                    echo '</div>';
                                }else{
                                    echo '<div role="alert" class="alert alert-danger item3">';
                                      echo '<strong>PCRE extension!&nbsp;&nbsp;&nbsp;</strong> Unsuccessfull.';
                                    echo '</div>';
                                    $flag = 1;
                                }

                                if(extension_loaded('SPL')){
                                    echo '<div role="alert" class="alert alert-success item4">';
                                      echo '<strong>SPL extension!&nbsp;&nbsp;&nbsp;</strong> Successfull.';
                                    echo '</div>';
                                }else{
                                    echo '<div role="alert" class="alert alert-danger item4">';
                                      echo '<strong>SPL extension!&nbsp;&nbsp;&nbsp;</strong> Unsuccessfull.';
                                    echo '</div>';
                                    $flag = 1;
                                }


                                if(extension_loaded('mbstring')){
                                    echo '<div role="alert" class="alert alert-success item5">';
                                      echo '<strong>MBString extension!&nbsp;&nbsp;&nbsp;</strong> Successfull.';
                                    echo '</div>';
                                }else{
                                    echo '<div role="alert" class="alert alert-danger item5">';
                                      echo '<strong>MBString extension!&nbsp;&nbsp;&nbsp;</strong> Unsuccessfull.';
                                    echo '</div>';
                                    $flag = 1;
                                }
                                echo '<div class="loader"></div>';

                                if($flag==1){
                                    echo '<div class="action">Please complete the requirements then try again.</div>';
                                }else{
                                    echo '<div class="action"><a class="btn btn-sm btn-primary" href="'.Url::toRoute('setup/step2').'">Next</a></div>';
                                }

                            ?>
                            
                            
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>



<?php

    $this->registerJs("

                $('.box_slide_down').slideDown('slow');
                
                setTimeout(function(){
                  $('.item1').fadeIn('slow');
                },1000);

                setTimeout(function(){
                  $('.item2').fadeIn('slow');
                },1300);

                setTimeout(function(){
                  $('.item3').fadeIn('slow');
                },2200);

                setTimeout(function(){
                  $('.item4').fadeIn('slow');
                },3000);

                setTimeout(function(){
                  $('.loader').slideUp('slow');
                  $('.item5').fadeIn('slow');
                },3500);

                setTimeout(function(){
                  $('.action').fadeIn('slow');
                },4500);
    ", yii\web\View::POS_READY, 'activate_front_theme');

?>