<?php 
if ( ! function_exists( 'tc_e_commerce_shop_related_posts_function' ) ) {
	function tc_e_commerce_shop_related_posts_function() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'    => absint( get_theme_mod( 'tc_e_commerce_shop_related_post_count', '3' ) ),
		);
		// Related by categories
		if ( get_theme_mod( 'tc_e_commerce_shop_post_order', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'tc_e_commerce_shop_post_order', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();

		return $query;
	}
}

$related_posts = tc_e_commerce_shop_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

	<div class="related-posts clearfix py-3">
		<?php if ( get_theme_mod('tc_e_commerce_shop_related_posts_title','Related Posts') != '' ) {?>
			<h2 class="related-posts-main-title"><?php echo esc_html( get_theme_mod('tc_e_commerce_shop_related_posts_title',__('Related Posts','tc-e-commerce-shop')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
				<div class="col-md-4 col-sm-4">
				    <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
				        <div class="postbox p-3 mb-4"> 
				        	<?php if(has_post_thumbnail() && get_theme_mod( 'tc_e_commerce_shop_feature_image_hide',true) != '') { ?>          
					            <div class="box-image">
					                <?php the_post_thumbnail();  ?>
					            </div>
					        <?php }?>
				            <div class="new-text">
				                <div class="box-content">
				                    <h3 class="py-2"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
			                        <?php if(get_the_excerpt()) { ?>
			                            <div class="entry-content"><p class="m-0"><?php $excerpt = get_the_excerpt(); echo esc_html( tc_e_commerce_shop_string_limit_words( $excerpt, esc_attr(get_theme_mod('tc_e_commerce_shop_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('tc_e_commerce_shop_button_excerpt_suffix','[...]') ); ?></p></div>
			                        <?php }?>
				                    <?php if ( get_theme_mod('tc_e_commerce_shop_post_button_text','Read Full') != '' ) {?>
				                        <a href="<?php the_permalink(); ?>" class="blogbutton-small hvr-sweep-to-right mt-2"><?php echo esc_html( get_theme_mod('tc_e_commerce_shop_post_button_text',__( 'Read Full','tc-e-commerce-shop' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('tc_e_commerce_shop_post_button_text',__( 'Read Full','tc-e-commerce-shop' )) ); ?></span></a>
				                    <?php }?>
				                </div>
				            </div>
				            <div class="clearfix"></div> 
				        </div> 
				    </article>
				</div>
			<?php endwhile; ?>
		</div>

	</div><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_postdata(); ?>