<?php
/**
 * @package 	WordPress
 * @subpackage 	Happy Events
 * @version		1.0.0
 * 
 * Posts Slider Video Service Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_project_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && happy_events_slider_post_check_exc_cont('project')) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && in_array('categories', $cmsmasters_metadata)) ? true : false;
$comments = (comments_open() && in_array('comments', $cmsmasters_metadata)) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$rating = in_array('rating', $cmsmasters_metadata) ? true : false;


$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);

$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);

?>

<!--_________________________ Start Video Service _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_project'); ?>>
	<div class="cmsmasters_slider_project_outer">
		<div class="project_outer_image_wrap">
		
		<?php 
			if ($icon || $price || $categories || $title || $likes || $comments) {
				echo '<div class="project_outer_image_wrap_meta entry-meta">';

					$icon ? happy_events_project_icon($cmsmasters_project_icon) : '';
					
					$price ? happy_events_project_price($cmsmasters_project_price, 'page') : '';

					if ($categories || $title || $likes || $comments) {
					
						echo '<div class="project_outer_image_wrap_meta_bottom entry-meta">';
						
							$categories ?  happy_events_get_slider_post_category(get_the_ID(), 'pj-categs', 'project') : '';
							
							$title ? happy_events_slider_post_heading(get_the_ID(), 'project', 'h2', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url) : '';
							
							$comments ? happy_events_get_slider_post_comments('project') : '';	
							
							$likes ? happy_events_slider_post_like('project') : '';
						
						echo '</div>';

					}
					
				echo '</div>';
			}

			happy_events_thumb_rollover(get_the_ID(), 'cmsmasters-service-thumb', false, true, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
		
		echo '</div>';
		
		if ($excerpt || $duration || $participants || $rating) {
			echo '<div class="project_inner">';
				
				$excerpt ? happy_events_slider_post_exc_cont('project') : '';

				echo '<footer class="cmsmasters_project_footer entry-meta">';

					$duration ? happy_events_project_duration($cmsmasters_project_duration, 'page') : '';

					$participants ? happy_events_project_participants($cmsmasters_project_participants, 'page') : '';

					if (CMSMASTERS_RATING && $rating) {
						happy_events_custom_rating(get_the_ID(), 'page');
					}
					
				echo '</footer>';
				
				
			echo '</div>';
		}
		
	?>
	</div>
</article>
<!--_________________________ Finish Video Service _________________________ -->

