<?php get_header(); ?>

<!-- Random quote loop -->
<div class="random-quote">

    <?php
        $args = array( 
            'post_type' => 'post', 
            'orderby' => 'rand',
            'numberposts' => 1
            );
        $quotes = get_posts( $args ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

    <!-- Random quote content -->
    <p><?php the_content(); ?> </p><!-- the quote -->

    <span>- <?php the_title(); ?> ,<span><a href="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>"><?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a></span>

    <?php endforeach;?>

</div>

<!-- Random quote generator -->
<button class="quote-button">Click Me!</button>
<div class="random-generated">
</div>

<!-- Footer -->
<?php get_footer();?>



