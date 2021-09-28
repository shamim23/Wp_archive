<?php
/**
* Template Name: Archive Template
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<div id="main" class="site-main" role="main">
		    <div class="row">
		        <h2> <?php the_title(); ?></h2>
		        </div>
		        <div clas="row"></div>
<?php
$children = get_terms( 'issues', array(
'parent'    => 0,
'orderby' => 'id', 
'hide_empty' => false
) );

        // The data array
        $list=$children;
        

      
        $params = '';
        foreach ($_GET as $key=>$value) {
            if (strtolower($key)=='start') continue;
            $params .= (empty($params)) ? "$key=$value" : "&$key=$value";
        }
        $url = get_permalink(). '?' . $params;

        // Page contents
        $last = count($list)-1;
        $start = (isset($_GET['start'])) ? intval($_GET['start']) : 0;
        if ($start<0) $start = 0; if ($start > $last) $start = $last;
        $maxpage = 1;
       // echo "<p>Start index = $start</p>" . PHP_EOL;
        $curpage = 0;
        // Navigation
        $prev = $start - $maxpage; if ($prev<0) $prev = 0;
        $next = ( ($start+$maxpage) > $last) ? $start : $start + $maxpage;
        $prev = ( ($start-$maxpage) < 0) ? 0 : $start - $maxpage;
      
        if($start!=0)
         echo '<p><a href="'.$url.'&start='.$prev.'">Previous</a>&nbsp;&nbsp;';
        for($xi=$start; $xi<=$last; $xi++) {
            if ($curpage >= $maxpage) break;
            $curpage++;
         ?>
          <a href="<?=get_term_link($list[$xi]->slug , 'issues')?>"><?=$list[$xi]->name ?></a>&nbsp;
               
   <?php     }

       
        if($start<count($list)-1)
        echo '<a href="'.$url.'&start='.$next.'">Next</a></p>';
        $term = $list[$start];
        

$children = get_terms( $term->taxonomy, array(
'parent'    => $term->term_id,
'orderby' => 'id', 
'hide_empty' => false
) );
 //print_r($term->taxonomy); // uncomment to examine for debugging
if($children) { // get_terms will return false if tax does not exist or term wasn't found.
    // term has children?>
   <div class="col-md-12"> <ul>
    <?php
    foreach ($children as $term) { ?>
        <li><a href="<?=get_term_link($term->slug, 'issues')?>"><?=$term->name?></a></li>
 
   
   <?php
    }
}
    ?>
		</div>
		<?php
		/*	while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

			endwhile;*/ // End of the loop.
			?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
//get_sidebar();
get_footer();
