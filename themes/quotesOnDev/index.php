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
    <div class="home-quote">
        <?php the_content(); ?> 
    </div>

    <span class="author">- <?php the_title(); ?></span>
    <a href="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" class="source-link"> <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a>

    <a href="<?php the_permalink(); ?>"><?php the_category();?></a>
    <?php endforeach;?>

</div>

<!-- Random quote generator -->
<button id="quote-button">Show Me Another!</button>


<!-- Footer -->
<?php get_footer();?>



