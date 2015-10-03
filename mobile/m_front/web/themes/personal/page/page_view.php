<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = $title;?>


<div class="project_details_header">
    <div class="project_details_header_left">
        <?php
                if(isset($parent_title_q)){
        ?>
            <a href="<?= Url::toRoute(['page/view', 'slug1' => $parent_title_q->page_slug]); ?>">
                <h1 class="projects_name line-height">
                        <?= $parent_title_q->page_title; ?>
                </h1>
            </a>
        <?php
            }
        ?>

        <?php
            if($slug2!=''){
        ?>

            <span class="paginaion_arrow">
                <img src="<?= $this->theme->baseUrl; ?>/images/right_arrow.png">
            </span>

        <?php
            }
        ?>
        <a href="#"><h1 class="projects_name line-height">
            <?php
                if(isset($data)){
                    echo $data->page_title;
                }
            ?>
        </h1></a>
    </div>

    <?php
        if($slug1!='buyers'){
    ?>
        <div class="project_details_header_right">
            <div class="right_arrow">
                <img src="<?= $this->theme->baseUrl; ?>/images/arrow.png">
            </div>
            <ul class="projects_menu">

                <?php
                    if(isset($child_pages)){
                        foreach ($child_pages as $key) {
                            echo '<li>';
                                echo '<a href="'.Url::toRoute(['page/view', 'slug1' => $parent_title_q->page_slug, 'slug2' => $key->page_slug]).'">'.$key->page_title.'</a>';
                            echo '</li>';
                        }
                    }
                ?>
                
            </ul>
        </div>

    <?php
        }
    ?>


</div>





<?php
    if($slug2=='apply-online'){
?>
        <p>&nbsp;</p>
        <?php

            if(Yii::$app->session->hasFlash('error')){
                echo '<div class="error_cont">';
                    echo Yii::$app->session->getFlash('error');
                echo '</div>';
            }

        ?>

        <div class="projects_booknow">

            <form enctype="multipart/form-data" method="POST" id="apply_form" name="apply_form" action="<?= Url::toRoute(['page/apply_online']); ?>">
                <input type="hidden" name="ApplyOnline[project_name]" value="">
                <div class="booknow">
                    <label>Name*</label>
                    <input type="text" value="" name="ApplyOnline[name]">
                    <span class="valid_message name"></span>
                </div>
                <div class="booknow">
                    <label>Present Address</label>
                    <input type="text" value="" name="ApplyOnline[present_address]">
                    <span class="valid_message present_address"></span>
                </div>
                <div class="booknow">
                    <label>Email ID*</label>
                    <input type="text" value="" name="ApplyOnline[email]">
                    <span class="valid_message email"></span>
                </div>
                <div class="booknow">
                    <label>Department</label>
                    <select name="ApplyOnline[department]">
                        <option value=""> Select Option</option>
                        <option value="Accounts &amp; Finance">Accounts &amp; Finance</option>
                        <option value="Business Development">Business Development</option>
                        <option value="Customer Services">Customer Services</option>
                        <option value=" Customer Relations &amp; Sales"> Customer Relations &amp; Sales </option>
                        <option value="Engineering">Engineering</option>
                        <option value="Facilities Management Services">Facilities Management Services</option>
                        <option value="HR &amp; Administration">HR &amp; Administration</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Legal">Legal</option>
                        <option value="Logistics">Logistics</option>
                        <option value="Marketing">Marketing </option>
                        <option value="Planning &amp; Co-ordination">Planning &amp; Co-ordination</option>
                        <option value="Supply Chain Management">Supply Chain Management</option>
                    </select>
                    <span class="valid_message department"></span>
                </div>
                <div class="booknow">
                    <label>Qualification*</label>
                    <input type="text" value="" name="ApplyOnline[qualification]">
                    <span class="valid_message qualification"></span>
                </div>
                <div class="booknow">
                    <label>Application for the Job</label>
                    <input type="text" value="" name="ApplyOnline[job]">
                    <span class="valid_message job"></span>
                </div>
                <div class="booknow">
                    <label>Upload CV (DOC/PDF)</label>
                    <div class="file_upload_cont"><span>Select File</span><input type="file" name="ApplyOnline[cv]" id="upload_file"></div>
                    <span class="selected_file"></span>
                    <span class="valid_message cv"></span>
                </div>

                <?php

                    if(Yii::$app->session->hasFlash('success')){
                        echo '<p>'.Yii::$app->session->getFlash('success').'</p>';
                    }

                ?>
                <p class="success_message_book"></p>
                <input type="submit" value="" class="booknow_submit book_form_submit" name="submit">
            </form>


            <script type="text/javascript">
            $('#upload_file').on('change',function(){
                $('.selected_file').html($(this).val());
            });
            </script>

        </div>


<?php
    }elseif($slug2=='land-contact-form'){

?>

        <div class="projects_booknow">

                <form enctype="multipart/form-data" method="POST" id="land_contact" name="land_contact" action="<?= Url::toRoute(['page/land_contact']); ?>">
                    <h4  class="director_title director_title_form">Land Information</h4>

                    <div class="booknow">
                        <label>Locality*</label>
                        <input type="text" value="" name="LandContact[locality]">
                        <span class="valid_message locality"></span>
                    </div>
                    <div class="booknow">
                        <label>Address details*</label>
                        <input type="text" value="" name="LandContact[address_details]">
                        <span class="valid_message address_details"></span>
                    </div>
                    <div class="booknow">
                        <label>Size/Area of the Plot</label>
                        <input type="text" value="" name="LandContact[size_area_plot]">
                        <span class="valid_message size_area_plot"></span>
                    </div>
                    <div class="booknow">
                        <label>Dimension (Length in feet)</label>
                        <input type="text" value="" name="LandContact[dimension_length]">
                        <span class="valid_message dimension_length"></span>
                    </div>
                    <div class="booknow">
                        <label>Dimension (Breadth in feet)</label>
                        <input type="text" value="" name="LandContact[dimension_breath]">
                        <span class="valid_message dimension_breath"></span>
                    </div>
                    <div class="booknow">
                        <label>Width of the front side Road*</label>
                        <input type="text" value="" name="LandContact[road_width]">
                        <span class="valid_message road_width"></span>
                    </div>

                    <div class="booknow">
                        <label>Category of Land</label>
                        <select name="LandContact[land_category]">
                            <option value=""> Select Option</option>
                            <option value="Freehold">Freehold</option>
                            <option value="Leasehold">Leasehold</option>
                        </select>
                        <span class="valid_message land_category"></span>
                    </div>
                    
                    <div class="booknow">
                        <label>Type of Land</label>
                        <select name="LandContact[land_type]">
                            <option value=""> Select Option</option>
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Others">Others</option>
                        </select>
                        <span class="valid_message land_type"></span>
                    </div>

                    <div class="booknow">
                        <label>Facing</label>
                        <select name="LandContact[faceing]">
                            <option value=""> Select Option</option>
                            <option value="East">East</option>
                            <option value="West">West</option>
                            <option value="North">North</option>
                            <option value="South">South</option>
                        </select>
                        <span class="valid_message faceing"></span>
                    </div>

                    <div class="booknow">
                        <label>Attractive features (if any)</label>
                        <select name="LandContact[other_attractive]">
                            <option value=""> Select Option</option>
                            <option value="Lakeside">Lakeside</option>
                            <option value="Corner Plot">Corner Plot</option>
                            <option value="Park Front">Park Front</option>
                            <option value="Playground">Playground</option>
                            <option value="Others">Others</option>
                        </select>
                        <span class="valid_message other_attractive"></span>
                    </div>

                    <div class="border_bottom"></div>

                    <h4 class="director_title director_title_form">Landowners Profile</h4>

                    <div class="booknow">
                        <label>Name of the Landowner*</label>
                        <input type="text" value="" name="LandContact[landowner_name]">
                        <span class="valid_message landowner_name"></span>
                    </div>

                    <div class="booknow">
                        <label>Contact Person</label>
                        <input type="text" value="" name="LandContact[contact_person]">
                        <span class="valid_message contact_person"></span>
                    </div>

                    <div class="booknow">
                        <label>Contact Address*</label>
                        <input type="text" value="" name="LandContact[contact_address]">
                        <span class="valid_message contact_address"></span>
                    </div>

                    <div class="booknow">
                        <label>E-mail ID*</label>
                        <input type="text" value="" name="LandContact[email]">
                        <span class="valid_message email"></span>
                    </div>

                    <div class="booknow">
                        <label>Telephone</label>
                        <input type="text" value="" name="LandContact[telephone]">
                        <span class="valid_message telephone"></span>
                    </div>

                    <div class="booknow">
                        <label>Cell phone*</label>
                        <input type="text" value="" name="LandContact[cell_phone]">
                        <span class="valid_message cell_phone"></span>
                    </div>

                    
                    <p class="success_message_book"></p>
                    <input type="submit" value="" class="booknow_submit" name="submit">
                </form>


                <script type="text/javascript">
                    $( "#land_contact" ).submit(function( event ) {
                            var form = $( "#land_contact" );

                            $.ajax({
                                    url: form.attr('action'),
                                    type: 'post',
                                    data: form.serialize(),
                                    success: function(data) {
                                        dt = jQuery.parseJSON(data);

                                        $('.success_message_book').html('');
                                        $('.error_message').html('');

                                        if(dt.result=='error'){
                                            
                                            $('.error_message').show();
                                            $('.error_message').html(dt.msg);

                                        }else{
                                            $('.error_message').hide();
                                            $('.success_message_book').html(dt.msg);
                                            $( "#land_contact" )[0].reset();
                                        }
                                        var position = $('.error_message').position();
                                        $("html, body").animate({ scrollTop: position.top }, 1000);
                                    }
                            });
                      return false;
                    });
                </script>

            </div>

            <div class="error_message error_cont" style="display:none;"></div>
<?php
    }elseif($slug1=='buyers'){

?>

        <div class="projects_booknow">
            
           

            <form method="POST" id="buyers" name="buyers" action="<?= Url::toRoute(['page/buyers_contact']); ?>">
                
                <h4 class="director_title director_title_form">A.Your Valued Interest</h4>
                <div class="booknow">
                    <label>Preferred Location</label>
                    <input type="text" value="" name="Buyers[preferred_location]">
                </div>

                <div class="booknow">
                    <label>Preferred Size</label>
                    <input type="text" value="" name="Buyers[preferred_size]">
                </div>

                <div class="booknow">
                    <label>Car Parking Requirement</label>
                    <input type="text" value="" name="Buyers[car_parking_req]">
                </div>

                <div class="booknow">
                    <label>Expected Handover Time</label>
                    <input type="text" value="" name="Buyers[expected_handover_time]">
                </div>

                <div class="border_bottom"></div>
                <h4 class="director_title director_title_form">B.Others Preferences</h4>

                <div class="booknow">
                    <label>Facing of the apartment</label>
                    <input type="text" value="" name="Buyers[facing_apartment]">
                </div>

                <div class="booknow">
                    <label>Preferred Floor</label>
                    <input type="text" value="" name="Buyers[preferred_floor]">
                </div>

                <div class="booknow">
                    <label>Loan Requirement</label>
                    <input type="text" value="" name="Buyers[loan_req]">
                </div>

                <div class="booknow">
                    <label>Minimum Number of Bed Rooms </label>
                    <input type="text" value="" name="Buyers[min_bed_rooms]">
                </div>

                <div class="booknow">
                    <label>Minimum Number of Bath Rooms</label>
                    <input type="text" value="" name="Buyers[min_bathroom_req]">
                </div>

                <div class="booknow">
                    <label>Maid's Accomodation</label>
                    <input type="text" value="" name="Buyers[maid_accomodation]">
                </div>

                <div class="border_bottom"></div>
                <h4 class="director_title director_title_form">C.Contact Information</h4>

                <div class="booknow">
                    <label>Name*</label>
                    <input type="text" value="" name="Buyers[name]">
                </div>

                <div class="booknow">
                    <label>Profession*</label>
                    <input type="text" value="" name="Buyers[profession]">
                </div>

                <div class="booknow">
                    <label>Designation</label>
                    <input type="text" value="" name="Buyers[designation]">
                </div>

                <div class="booknow">
                    <label>Mobile Number</label>
                    <input type="text" value="" name="Buyers[mobile_number]">
                </div>

                <div class="booknow">
                    <label>E-mail ID*</label>
                    <input type="text" value="" name="Buyers[email]">
                </div>

                <div class="booknow">
                    <label>Mailing Address</label>
                    <input type="text" value="" name="Buyers[mailing_address]">
                </div>

                
                <p class="success_message_book"></p>
                <input type="submit" value="" class="booknow_submit" name="submit">
            </form>


        </div>

        <div class="error_message error_cont" style="display:none;"></div>


        <script type="text/javascript">
            $( "#buyers" ).submit(function( event ) {
                    var form = $( "#buyers" );

                    $.ajax({
                            url: form.attr('action'),
                            type: 'post',
                            data: form.serialize(),
                            success: function(data) {
                                dt = jQuery.parseJSON(data);

                                $('.success_message_book').html('');
                                $('.error_message').html('');

                                if(dt.result=='error'){
                                    
                                    $('.error_message').show();
                                    $('.error_message').html(dt.msg);

                                }else{
                                    $('.error_message').hide();
                                    $('.success_message_book').html(dt.msg);
                                    $( "#buyers" )[0].reset();
                                }
                                var position = $('.error_message').position();
                                $("html, body").animate({ scrollTop: position.top }, 1000);
                            }
                    });
              return false;
            });
        </script>
<?php
    }
    else{
?>

    <div class="common_details_container">
        <div class="common_box">
            <?php
                if(isset($data)){
                    echo $data->page_desc;
                }
            ?>
        </div>
    </div>

<?php
    }
?>

<script type="text/javascript">
    if($('.error_cont').length>0){
        var position = $('.error_cont').position();
        $("html, body").animate({ scrollTop: position.top }, 1000);
    }
</script>