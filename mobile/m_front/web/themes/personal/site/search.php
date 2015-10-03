<?php

use yii\helpers\Url;
use m_front\models\Product;
use m_front\models\ProductSpecification;

$this->title = 'Search';
?>



<script type="text/javascript" src="<?= $this->theme->baseUrl; ?>/js/bootstrap3-typeahead.min.js"></script>
<style type="text/css">
    .container_bg_search{
        background: url("<?= $this->theme->baseUrl; ?>/images/banner_photo.png") no-repeat fixed center center / cover;
    }
</style>


<div class="projects_booknow">

    <form method="POST" id="search_form" name="search_form" action="">

        <div class="booknow">

            <p class="findProject">FIND A PROJECT</p>
            <p class="searchPageDescription">Fill up the field to find a project. </p>

            <label>Projects</label><br>
            <input type="text" value="" name="Search[project_category]" id="by_project"/>

<!--            <label>By Category</label><br>-->
<!--            <input type="text" value="" name="Search[project_category]" id="by_project">-->
<!---->
<!---->
<!--            <select name="Search[project_category]" id="by_project">-->
<!--                <option value="volvo">Tropical Molla Tower</option>-->
<!--                <option value="saab">Tropical Rahman Tower</option>-->
<!--                <option value="mercedes">Tropical P.M. Madina Villa</option>-->
<!--                <option value="audi">Tropical Hasan Tower</option>-->
<!--            </select>-->
<!---->
<!---->
<!--            <label>By City</label><br>-->
<!--            <input type="text" value="" name="Search[project_city]" id="by_project">-->
<!---->
<!---->
<!--            <select name="Search[project_category]" id="by_project">-->
<!--                <option value="volvo">Tropical Molla Tower</option>-->
<!--                <option value="saab">Tropical Rahman Tower</option>-->
<!--                <option value="mercedes">Tropical P.M. Madina Villa</option>-->
<!--                <option value="audi">Tropical Hasan Tower</option>-->
<!--            </select>-->
<!---->
<!---->
<!---->
<!--            <label>By Zone</label><br>-->
<!--            <input type="text" value="" name="Search[project_zone]" id="by_project">-->
<!---->
<!--            <select name="Search[project_category]" id="by_project">-->
<!--                <option value="volvo">Tropical Molla Tower</option>-->
<!--                <option value="saab">Tropical Rahman Tower</option>-->
<!--                <option value="mercedes">Tropical P.M. Madina Villa</option>-->
<!--                <option value="audi">Tropical Hasan Tower</option>-->
<!--            </select>-->
<!---->
<!--            <label>By Size (IN SFT)</label><br>-->
<!---->
<!---->
<!--            <select name="Search[project_category]" id="by_project">-->
<!--                <option value="volvo">Tropical Molla Tower</option>-->
<!--                <option value="saab">Tropical Rahman Tower</option>-->
<!--                <option value="mercedes">Tropical P.M. Madina Villa</option>-->
<!--                <option value="audi">Tropical Hasan Tower</option>-->
<!--            </select>-->


        </div>





        <input type="submit" value="Submit" class="booknow_submit" name="submit">
    </form>


</div>

<div id="search_result">
    <div id="search_cn">
    	<?php
    		if(isset($finalResponse)){
    	?>
	    	<h4 class="search_head"> <?= $finalResponse['totalResult']; ?> RESULTS FOUND</h4>
	    	<ul id="sr_resultlist">
	    		

	    		<?php 
	    			if($finalResponse['totalResult']>0){
	    				foreach ($finalResponse['searchedData'] as $key) {
	    					
	    		?>
				    		<li>
				    			<a href="<?= Url::base().'/projects/'.$key['url']; ?>">
				    				<?= $key['title']; ?>
				    				<br/>
				    				<span><?= $key['location']; ?></span>
				    			</a>
				    		</li>
	    		<?php
			    		}
			    	}
		    	?>

	    	</ul>
    	<?php
    		}
    	?>
    </div>
</div>


<?php 
    $search_suggession=Product::find()->select('title')->All();
    foreach($search_suggession as $suggessition){

        $suggessition_content[] = $suggessition->title;  
    }

    $search_suggession_location=ProductSpecification::find()
                                            ->where(['item_name'=>'Location'])
                                            ->groupBy(['item_val'])
                                            ->all();
    foreach($search_suggession_location as $suggessition_location){

        $suggessition_content_location[] = $suggessition_location->item_val;  
    }
?>

<?php 
$suggessition_content = json_encode($suggessition_content); 
$suggessition_content_location = json_encode($suggessition_content_location);
?>

<script>  

    $(document).ready(function(){
      var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;
                 
                matches = [];
                substrRegex = new RegExp(q, 'i');
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push({ value: str });
                    }
                });
         
            cb(matches);

            };
        };

        var suggessition_content = <?php echo $suggessition_content; ?>;
        
        $('#by_project').typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
          },
          {
            name: 'states',
            displayKey: 'value',
            source: substringMatcher(suggessition_content),
            item: 4
        });


        $('#by_project').on('typeahead:selected', function(evt, item) {
            $('.booknow_submit').click();
        })

        var suggessition_content_location = <?php echo $suggessition_content_location; ?>;
        
        $('#by_location').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
          },
          {
            name: 'states',
            displayKey: 'value',
            source: substringMatcher(suggessition_content_location),
            item: 4
        });

        $('#by_location').on('typeahead:selected', function(evt, item) {
            $('.booknow_submit').click();
        })
        
        if($('#search_cn .search_head').length>0){
            var position = $('#search_cn').position();
            
            $("html, body").animate({ scrollTop: position.top }, 1000);
        }

    });



</script>