<?php
/*
Template Name: Blog template
My default line by line
*/
$blog_posts = new WP_Query( array( 'post_type' => 'post', 'post_status’' => 'publish', 'posts_per_page' => -1 ) );
get_header();
?>
<section class="single-page">
	<div class="main-content">
    <h1>LATEST BLOGS</h1>
        <?php if ( $blog_posts->have_posts() ) : ?>
        <div class="blog-posts">
            <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
            <article id="post-<?php the_ID(); ?>">
                <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) { 
the_post_thumbnail( get_the_ID(), 'full' );
} ?>
                    <h2 class="post-title"><?php the_title(); ?></h2>

                    <div class="post-excerpt">
                        <?php wp_kses_post( the_excerpt() ) ?>

                    </div>

                    <span class="post-read-more">
                        <a itemprop="url" href="<?php the_permalink(); ?>" target="_blank">
                            <?php echo esc_html__( 'Read more', 'theme-domain' ) ?>
                        </a>
                    </span>
            </article>
            <br><br>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <p class="no-blog-posts">
            <?php esc_html_e('Sorry, no posts matched your criteria.', 'theme-domain'); ?>
        </p>
        <?php endif; 
wp_reset_postdata(); ?>
    </div>

</div>
<?php get_footer(); ?>