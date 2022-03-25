<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
 
</style>
	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
        <div id="tabs">
			<ul class="nav nav-tabs">
    <li class="active"><a href="#tabs-1" data-toggle="tab">Start</a></li>
    <li><a href="#tabs-2" data-toggle="tab">Ingredients</a></li>
    <li><a href="#tabs-3" data-toggle="tab">Tools</a></li>
    <li class="customdd"><a href="#tabs-4" data-toggle="tab" class="mycustomtb">Cook!</a></li>
</ul>
             <div class="tab-content">
           	<div class="tab-pane" id="tabs-1">
       
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );
           
			if ( generate_has_default_loop() ) { ?>
                 <div class="Recipe_container__starts">
                 <?php
				while ( have_posts() ) : the_post();
					?>
                     <h2 class="recepi_title"><?php echo get_the_title(); ?></h2>
                     <p class="Recipe_recipeDescription"><?php echo get_the_content(); ?></p>
					           <div class="RecipePreview_image__Ih">
                     <div class="recipe_main_img">
      
                     <?php  echo get_the_post_thumbnail(); ?>
                     </div>
					          </div>
                  <?php
                  //generate_do_template_part( 'single' );

				endwhile;
				?>
       </div>
				<?php
			} 

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
      <div class="right-arrow"><a class="btn btn-primary next-tab" href="#">Swipe to begin</a></div>
			<!-- <a class="btn btn-primary btnNext">Swipe to begin</a>-->
      </div>
			<div class="tab-pane" id="tabs-2">
                
                <!--get Ingrdients field groups-->
                <?php if( have_rows('ingredients_fields') ): 
                     
                     $acf_fields = acf_get_fields_by_id(87);
                   // echo '<pre>'; print_r($acf_fields);
                   $count_of_sub_fields = count($acf_fields[0]['sub_fields']);
                  // echo $count_of_sub_fields;

                	?>
               
                <div class="row recipe_cls" id="my_ingrdients_content">
                <?php 
                 
                    // Get sub field values.
                    for($i=1; $i<=$count_of_sub_fields; $i++) {
                     while( have_rows('ingredients_fields') ): the_row(); 
                        $a = get_sub_field('ingredients_'.$i.'_image');
                       if(!empty($a)){ 
                	?>
                  <div class="col">
                  	<div class="ingredient_imgs"><img src="<?php echo $a; ?>"></div>
                  	<div class="ingredient_chk"><input type="checkbox" name="my_Ingedient_chk" value="" class="chkbox_f"></div>
                  	<div class="ingredient_txts"><p class="Ingre-txts"><?php the_field('ingredients_'.$i.'_text'); ?></p></div>

                  </div>
                
                    
                     <?php 
                   }
                      endwhile;
                      }
                 ?>
                       </div>
                   <?php endif; ?>

                <!--end ingredients code -->

            <!--<a class="btn btn-primary btnPrevious">Previous</a>
        <a class="btn btn-primary btnNext">Next</a>
        -->
         <div class="left-arrow"><a class="btn btn-same prev-tab" href="#">Prev</a></div>
         <div class="right-arrow"><a class="btn btn-same next-tab" href="#">Next</a></div>
    </div>
			 <div class="tab-pane" id="tabs-3">

         <!--get tools field groups-->
                <?php if( have_rows('tools_fields') ): 
                     
                     $acf_fields = acf_get_fields_by_id(97);
                   // echo '<pre>'; print_r($acf_fields);
                   $count_of_sub_fields = count($acf_fields[0]['sub_fields']);
                  // echo $count_of_sub_fields;

                  ?>
               
                 <div class="row recipe_cls" id="my_ingrdients_content">
                <?php 
                 
                    // Get sub field values.
                    for($i=1; $i<=$count_of_sub_fields; $i++) {
                     while( have_rows('tools_fields') ): the_row(); 
                        $a = get_sub_field('tools_'.$i.'_image');
                       if(!empty($a)){ 
                  ?>
                  <div class="col">
                    <div class="ingredient_imgs"><img src="<?php echo $a; ?>"></div>
                    <div class="ingredient_chk"><input type="checkbox" name="my_Ingedient_chk" value="" class="chkbox_f"></div>
                    <div class="ingredient_txts"><p class="Ingre-txts"><?php the_field('tools_'.$i.'_text'); ?></p></div>

                  </div>
                
                    
                     <?php 
                   }
                      endwhile;
                      }
                 ?>
                       </div>
                   <?php endif; ?>
                  <!-- <a class="btn btn-primary btnPrevious">Previous</a>
          <a class="btn btn-primary btnNext">Next</a>-->
           <div class="left-arrow"><a class="btn btn-same prev-tab" href="#">Prev</a></div>
         <div class="right-arrow"><a class="btn btn-same next-tab" href="#">Next</a></div>
        
    </div>

     <div class="tab-pane" id="tabs-4">

            <!--get slider field groups-->
            
     
   
               <div class="wrapper myCookslider">
               <div class="center-slider">
                <?php if( have_rows('cook_fields') ): 
                     
                    $acf_fields = acf_get_fields_by_id(97);
                    // echo '<pre>'; print_r($acf_fields);
                    $count_of_sub_fields = count($acf_fields[0]['sub_fields']);
                    // echo $count_of_sub_fields;

                    // Get sub field values.
                    for($i=1; $i<=$count_of_sub_fields; $i++) {
                     while( have_rows('cook_fields') ): the_row(); 
                        $a = get_sub_field('slide_'.$i.'_image');
                       if(!empty($a)){ 
                  ?>
                  <div class="clip">
                  
                    <img src="<?php echo $a; ?>" class="slide-immg">
                    <p class="slide-txts"><?php the_field('slide_'.$i.'_text'); ?></p>
                    <span class="my-slidenum"><?php echo $i; ?></span>
                     
                  </div>
                
                    
                     <?php 
                   }
                      endwhile;
                      }
                    ?>
                   
                <?php endif; ?>
                
       </div>
       <span class="pagingInfo"></span>
</div>

        <!--<a class="btn btn-primary btnPrevious">Previous</a>-->
         <div class="left-arrow"><a class="btn btn-same prev-tab" href="#">Prev</a></div>
      
    </div>
</div>
  </div>
        

		</main>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();
?>
<script>

    // adds vertical tab css 
$(function() {
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );

  });

// allows for next and previous buttons with sliding content
var $tabs = $('#tabs').tabs({
    activate: function( event, ui ) {
        $tabs.tabs('option', 'hide', false);
        $tabs.tabs('option', 'show', false);
    }
});

function mineFunction(){
  $('.ui-tabs-tab').removeClass('active');
  setTimeout(function(){
    $('.ui-widget-header li').each(function(){
      if($(this).hasClass('ui-tabs-active')){ 
      $(this).addClass('active');
      return false;
    }else{
      $(this).addClass('active');
       $(this).addClass('customnav');
    }
    });
  }, 500);
}


function mineFunctionslide(){
  
  setTimeout(function(){
    $('.ui-widget-header li').each(function(){
      if($(this).hasClass('ui-tabs-active')){ 
       $('.center-slider').get(0).slick.setPosition()
      return false;
    }
    });
  }, 500);
}



$('.next-tab').click(function (e) {
    e.preventDefault();
    mineFunction();
    mineFunctionslide();
    
    
    $tabs.tabs('option', 'hide', { effect: 'slide', direction: 'left', duration: 300 });
    $tabs.tabs('option', 'show', { effect: 'slide', direction: 'right', duration: 300 });
    var selected = $tabs.tabs('option', 'active');
    $tabs.tabs('option', 'active', (selected + 1));
    
});

$('.prev-tab').click(function (e) {
    e.preventDefault();
     mineFunction();
    $tabs.tabs('option', 'hide', { effect: 'slide', direction: 'left', duration: 300 });
    $tabs.tabs('option', 'show', { effect: 'slide', direction: 'right', duration: 300 });
    var selected = $tabs.tabs('option', 'active');
    $tabs.tabs('option', 'active', (selected - 1));

});


</script>

<script>

   
$(document).ready(function(){
$( ".mycustomtb" ).on( "click", function() {
  //$( ".center-slider" ).slideToggle( "slow" );
  $('.center-slider').get(0).slick.setPosition(); //.news-items is class for the slider.
  return false;
});




var $status = $('.pagingInfo');
var $slidenum = $('.my-slidenum');
var $slickElement = $('.center-slider');

 

$slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){

    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.text(i + '/' + slick.slideCount);
    
   
});


  


      $slickElement.slick({
      	infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        arrows: true,
        dots: false,
        speed: 500,
        responsive: [ { breakpoint: 768, settings: { slidesToShow: 1, centerMode: false, /* set centerMode to false to show complete slide instead of 3 */ slidesToScroll: 1 } } ]
       

      });
 

    });
</script>

<?php	get_footer();
