<?php get_header(); ?>
<div class="category-page">
    <?php  
    if( have_posts() )  
    while( have_posts() ) :
    the_post(); 
    ?>
    <div class="home-quote">
        <?php the_content(); ?> 
    </div>
    <span class="author">- <?php the_title(); ?>
    <a href="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" class="source-link" target="new"> 
    <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a></span>
    <hr class="dotted-line">
    <?php endwhile;?>
</div>
<div class="posts-nav">
    <?php the_posts_pagination(array (
    'prev_text' => __( 'Prev' ),
    'next_text' => __( 'Next' ),  
    'screen_reader_text' => __('  ')
    ));?>
</div>
<!-- Footer -->
<?php get_footer();?>



