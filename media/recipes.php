<?php /* Template Name: recipes */ 

get_header();
?>

<?php 
$args = array( 'post_type' => 'recipes', 'posts_per_page' => 10 );
$the_query = new WP_Query( $args ); 
?>


<div <?php generate_do_attr( 'content' ); ?> >
		<main <?php generate_do_attr( 'main' ); ?>>
			<div class="sites_content recipe_container">
         <div class="cats-filter-area">
         		
          <div class="filter-area-heads">
          	<a href="javascript:void(0)" class="btn-filters" data-action="toggle" data-side="right" id="mobile-filter"><span class="filters-icons" ><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg"><path d="M24.135 5.822c0-1.537-1.06-2.83-2.479-3.218V.87a.867.867 0 10-1.734 0V2.6c-1.423.386-2.487 1.682-2.487 3.222 0 1.525 1.043 2.81 2.445 3.21l.042 14.372a.867.867 0 001.734 0l-.042-14.348c1.441-.374 2.52-1.68 2.52-3.234zm-1.734 0c0 .903-.712 1.617-1.615 1.617a1.604 1.604 0 01-1.617-1.617c0-.903.714-1.615 1.617-1.615S22.4 4.92 22.4 5.822zm-6.643 9.261c0-1.563-1.078-2.878-2.523-3.266V.87a.867.867 0 10-1.734 0V11.82c-1.444.389-2.524 1.703-2.524 3.264 0 1.561 1.08 2.875 2.524 3.264v5.057a.867.867 0 001.734 0V18.35c1.445-.388 2.523-1.703 2.523-3.266zm-1.734 0c0 .926-.728 1.66-1.654 1.66-.926 0-1.66-.734-1.66-1.66 0-.926.734-1.66 1.66-1.66.926 0 1.654.734 1.654 1.66zM6.92 8.347c0-1.561-1.079-2.877-2.522-3.266V.87a.867.867 0 10-1.734 0v4.208C1.216 5.466.134 6.783.134 8.347c0 1.563 1.083 2.878 2.53 3.265v11.792a.867.867 0 001.734 0V11.611C5.84 11.22 6.92 9.907 6.92 8.347zm-1.733 0c0 .926-.733 1.659-1.66 1.659-.926 0-1.659-.733-1.659-1.66 0-.926.733-1.659 1.66-1.659.926 0 1.659.733 1.659 1.66z" fill="#4D4D4D" fill-rule="nonzero"></path></svg></span></a>
            <p class="sorting-fields"><span class="sort-bold">Sort By:</span><span class="default-txt">Default</span></p>
          	<a href="javascript:void(0)" class="btn-filters" data-action="toggle" data-side="right" id="desktop-filter"><span class="filters-icons"><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg"><path d="M24.135 5.822c0-1.537-1.06-2.83-2.479-3.218V.87a.867.867 0 10-1.734 0V2.6c-1.423.386-2.487 1.682-2.487 3.222 0 1.525 1.043 2.81 2.445 3.21l.042 14.372a.867.867 0 001.734 0l-.042-14.348c1.441-.374 2.52-1.68 2.52-3.234zm-1.734 0c0 .903-.712 1.617-1.615 1.617a1.604 1.604 0 01-1.617-1.617c0-.903.714-1.615 1.617-1.615S22.4 4.92 22.4 5.822zm-6.643 9.261c0-1.563-1.078-2.878-2.523-3.266V.87a.867.867 0 10-1.734 0V11.82c-1.444.389-2.524 1.703-2.524 3.264 0 1.561 1.08 2.875 2.524 3.264v5.057a.867.867 0 001.734 0V18.35c1.445-.388 2.523-1.703 2.523-3.266zm-1.734 0c0 .926-.728 1.66-1.654 1.66-.926 0-1.66-.734-1.66-1.66 0-.926.734-1.66 1.66-1.66.926 0 1.654.734 1.654 1.66zM6.92 8.347c0-1.561-1.079-2.877-2.522-3.266V.87a.867.867 0 10-1.734 0v4.208C1.216 5.466.134 6.783.134 8.347c0 1.563 1.083 2.878 2.53 3.265v11.792a.867.867 0 001.734 0V11.611C5.84 11.22 6.92 9.907 6.92 8.347zm-1.733 0c0 .926-.733 1.659-1.66 1.659-.926 0-1.659-.733-1.659-1.66 0-.926.733-1.659 1.66-1.659.926 0 1.659.733 1.659 1.66z" fill="#4D4D4D" fill-rule="nonzero"></path></svg></span><span class="filters-txt">Filter & Sort</span></a>
   
             <div class="total-num-posts">
              <?php // Get total number of posts in post-type-name
  $count_posts = wp_count_posts('recipes');
  $total_posts = $count_posts->publish;
  echo $total_posts . ' Results';
?>
</div>
            <div class="saerch-forms">
              <form method="post">
               <div class="input-fields"><span class="search-icon"><i class="fa fa-search"></i></span><input name="mysearch" class="srch-field" placeholder="Search Recipes"></div>
              </form>
            </div>
          </div>

          <!--sidebar contents-->

          <div class="sidebars">
          <div class="sidebar right"> 
	

	<div class="side-heads">
	<h4 class="side-title" >Filter and Sort</h4>
	<button type="button" class="side-close"><p class="side-close-txt">x</p></button>
</div>
<div class="below-filter-haeds">
    <input type="hidden" name="my-fill-c" class="my-fillc" value=0>
  <p class="selected-filter-count"></p>
  <p class="filter-clear"><a href="javascript:void(0)" class="filter-anger-link">Clear All</a></p>
  </div>


<form method="post">
	<!-- sort filter -->

<!-- category filter -->
	<div class="filter1"><span>Dishes</span><span id="acordian2"><svg width="20" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M2 2l8.533 8L18 2" stroke="#4D4D4D" stroke-width="2.667" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
     <div id="cat" class="cat-list_item">
		<?php 
    $args = array(
 'type' => 'recipes',
 'hide_empty' => false,
);
		$categories = get_categories($args);
foreach($categories as $category) {

   echo '<input type="checkbox"  name="cats" class="my-checkbx" data-slug="'.$category->slug.'">' . $category->name . '<br>';
   
}

	 ?></div>
	</div>

<!-- Seasons filter -->

<div class="filter1"><span>Seasons</span><span id="acordian4"><svg width="20" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M2 2l8.533 8L18 2" stroke="#4D4D4D" stroke-width="2.667" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
 <div id="season" class="tag-list_item">
<?php
$args2 = array(
 'type' => 'recipes',
 'hide_empty' => false,
);
$tags = get_tags($args2);

foreach ( $tags as $tag ) {
     echo '<input type="checkbox"  name="'.$tag->name.'" class="my-checkbx" data-tag="'.$tag->slug.'">' . $tag->name . '<br>';
}
?></div>
</div>
<!-- Cuisine filter -->

	</form>

</div>
</div>

<!--end sidebar content -->
      </div>

<div class="container-fluid">

	<div class="row recipe_row">
<?php if ( $the_query->have_posts() ) : ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="col-sm-4">
			<div class="image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			</div>
			<div class="title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		</div>
<?php endwhile;
wp_reset_postdata(); ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
	</div>
</div>
</div>
</main>
</div>
<script>
	$(document).ready(function () {
    // All sides
    var sides = ["left", "top", "right", "bottom"];
    $("h1 span.version").text($.fn.sidebar.version);

    // Initialize sidebars
    for (var i = 0; i < sides.length; ++i) {
        var cSide = sides[i];
        $(".sidebar." + cSide).sidebar({side: cSide});
    }

    // Click handlers
    $(".btn[data-action]").on("click", function () {
        var $this = $(this);
        var action = $this.attr("data-action");
        var side = $this.attr("data-side");
        $(".sidebar." + side).trigger("sidebar:" + action);
        return false;
    });
});

	jQuery(document).ready(function(){
		jQuery("#sort").hide();
		jQuery("#cat").hide();
		jQuery("#dish").hide();
		jQuery("#season").hide();
		jQuery("#cuisine").hide();

	//jQuery("#btn-sidebar").click(function(){
   // jQuery(".sidebar").dialog();
  //});
  jQuery("#acordian1").click(function(){
    jQuery("#sort").slideToggle();
  });
   jQuery("#acordian2").click(function(){
    jQuery("#cat").slideToggle();
  });
   
   jQuery("#acordian4").click(function(){
    jQuery("#season").slideToggle();
  });
   

});




/*  side popup close */
$(".side-close").click(function (){
   $('.container-fluid').removeClass('overlay');
   $('.sidebars').addClass('hidedata');
    $('.sidebar').css("right", "-270px");
});
$(".btn-filters").click(function (){
  
   $('.container-fluid').addClass('overlay');
   $('.sidebars').removeClass('hidedata');
   $('.sidebar').css("right", 0);
});



	$('.cat-list_item input').on('click', function() {
  //$('.cat-list_item p').removeClass('active');
  //$(this).addClass('active');


// var bb = $(this).data('slug');
// alert(bb);
  $.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filter_projects',
      category: $(this).data('slug'),
    },
    success: function(res) {
      //alert(res);
      $('.recipe_row').html(res);
       $('.recipe_row').html(res);

       var bc = $('.tag-p-count').val();
    $('.total-num-posts').html(bc+' Results');
    }
  });
});


  $('.tag-list_item input').on('click', function() {
  //$('.cat-list_item p').removeClass('active');
  //$(this).addClass('active');
  var a = $('input.my-fillc').val();
  var b = 1;
  var bb = (+a) + (+b);
  //alert(bb);
   $('selected-filter-count').text(bb+' Selected');
$('below-filter-haeds input').val(bb);
// var bb = $(this).data('slug');
// alert(bb);
  $.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filter_projects_tags',
      tag: $(this).data('tag'),
    },
    success: function(res) {
     
      //tag-p-count
      $('.recipe_row').html(res);

       var bc = $('.tag-p-count').val();
    $('.total-num-posts').html(bc+' Results');
     
    }
  });
});
</script>

<script>
$(document).ready(function(){
  $(".srch-field").keyup(function(){
    //alert(this.value);
    var inputdata = $(this).val();
    console.log(inputdata);
       
       $.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filter_projects_search',
      srch: $(this).val(),
    },
    success: function(res) {
      $('.recipe_row').html(res);
       $('.recipe_row').html(res);

       var bc = $('.tag-p-count').val();
    $('.total-num-posts').html(bc+' Results');
    }
  });


  });

// clear all filter code
  $(".filter-anger-link").on('click', function(){

       
       $.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filter_projects_clear_filters',
    },
    success: function(res) {
      $(".my-checkbx").prop("checked", false);
      $('.recipe_row').html(res);
       $('.recipe_row').html(res);

       var bc = $('.tag-p-count').val();
    $('.total-num-posts').html(bc+' Results');
    }
  });


  });



});
</script>

<?php
 get_footer(); ?>